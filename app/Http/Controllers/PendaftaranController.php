<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan form pemakaian aula.
     */
    public function create(Aula $aula)
    {
        return view('pendaftaran.create', [
            'user' => Auth::user(),
            'aula' => $aula,
        ]);
    }

    /**
     * Menyimpan pengajuan pemakaian aula.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'aula_id' => [
                'required',
                'exists:aulas,id',
            ],

            'nama_pemohon' => [
                'required',
                'string',
                'max:255',
            ],

            'nip' => [
                'required',
                'string',
                'max:50',
            ],

            'jabatan' => [
                'required',
                'string',
                'max:255',
            ],

            'unit_organisasi' => [
                'required',
                Rule::in([
                    'Sekretariat',
                    'Bidang Informasi Publik dan Statistik',
                    'Bidang Komunikasi Publik',
                    'Bidang Aplikasi Informatika',
                    'Bidang Persandian dan Keamanan Informasi',
                ]),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'tanggal' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'jam_mulai' => [
                'required',
                'date_format:H:i',
            ],

            'jam_selesai' => [
                'required',
                'date_format:H:i',
                'after:jam_mulai',
            ],

            'jumlah_peserta' => [
                'required',
                'integer',
                'min:1',
            ],

            'peserta_pihak_luar' => [
                'required',
                Rule::in([
                    'ada',
                    'tidak_ada',
                ]),
            ],

            'keperluan' => [
                'required',
                'string',
            ],
        ], [

            'aula_id.required' =>
                'Jenis aula wajib dipilih.',

            'aula_id.exists' =>
                'Aula yang dipilih tidak ditemukan.',

            'nama_pemohon.required' =>
                'Nama pemohon wajib diisi.',

            'nip.required' =>
                'NIP wajib diisi.',

            'jabatan.required' =>
                'Jabatan wajib diisi.',

            'unit_organisasi.required' =>
                'Unit organisasi wajib dipilih.',

            'unit_organisasi.in' =>
                'Unit organisasi yang dipilih tidak valid.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'tanggal.required' =>
                'Tanggal pemakaian wajib diisi.',

            'tanggal.after_or_equal' =>
                'Tanggal pemakaian tidak boleh sebelum hari ini.',

            'jam_mulai.required' =>
                'Jam mulai wajib diisi.',

            'jam_selesai.required' =>
                'Jam selesai wajib diisi.',

            'jam_selesai.after' =>
                'Jam selesai harus lebih besar dari jam mulai.',

            'jumlah_peserta.required' =>
                'Jumlah peserta wajib diisi.',

            'jumlah_peserta.min' =>
                'Jumlah peserta minimal 1 orang.',

            'peserta_pihak_luar.required' =>
                'Silakan pilih apakah terdapat peserta pihak luar.',

            'peserta_pihak_luar.in' =>
                'Pilihan peserta pihak luar tidak valid.',

            'keperluan.required' =>
                'Keperluan wajib diisi.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA AULA
        |--------------------------------------------------------------------------
        */

        $aula = Aula::findOrFail($data['aula_id']);

        /*
        |--------------------------------------------------------------------------
        | CEK KAPASITAS AULA
        |--------------------------------------------------------------------------
        */

        if ($data['jumlah_peserta'] > $aula->kapasitas) {
            return back()
                ->withInput()
                ->withErrors([
                    'jumlah_peserta' =>
                        'Jumlah peserta melebihi kapasitas ' .
                        $aula->nama_aula .
                        '. Kapasitas maksimal ' .
                        $aula->kapasitas .
                        ' orang.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | CEK BENTROK JADWAL
        |--------------------------------------------------------------------------
        */

        $bentrok = Pendaftaran::where(
                'aula_id',
                $data['aula_id']
            )
            ->where(
                'tanggal',
                $data['tanggal']
            )
            ->whereIn(
                'status',
                ['menunggu', 'disetujui']
            )
            ->where(function ($query) use ($data) {

                $query
                    ->where(
                        'jam_mulai',
                        '<',
                        $data['jam_selesai']
                    )
                    ->where(
                        'jam_selesai',
                        '>',
                        $data['jam_mulai']
                    );
            })
            ->exists();

        if ($bentrok) {
            return back()
                ->withInput()
                ->withErrors([
                    'tanggal' =>
                        'Aula tersebut sudah memiliki pengajuan pada tanggal dan jam yang dipilih.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA PENGAJUAN
        |--------------------------------------------------------------------------
        */

        Pendaftaran::create([
            'user_id' => Auth::id(),
            'aula_id' => $data['aula_id'],
            'nama_pemohon' => $data['nama_pemohon'],
            'nip' => $data['nip'],
            'jabatan' => $data['jabatan'],
            'instansi' => $data['unit_organisasi'],
            'unit_organisasi' => $data['unit_organisasi'],
            'email' => $data['email'],
            'tanggal' => $data['tanggal'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'jumlah_peserta' => $data['jumlah_peserta'],
            'peserta_pihak_luar' =>
                $data['peserta_pihak_luar'],
            'keperluan' => $data['keperluan'],
            'status' => 'menunggu',
        ]);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT KE RIWAYAT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('pendaftaran.history')
            ->with(
                'success',
                'Pengajuan pemakaian aula berhasil dikirim dan sedang menunggu persetujuan admin.'
            );
    }

    /**
     * Menampilkan riwayat pemakaian user.
     */
    public function history()
    {
        $pendaftarans = Pendaftaran::with('aula')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pendaftaran.history', [
            'user' => Auth::user(),
            'pendaftarans' => $pendaftarans,
        ]);
    }
}