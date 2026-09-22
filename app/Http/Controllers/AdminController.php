<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $stats = [
            'total' => Pendaftaran::count(),

            'menunggu' => Pendaftaran::where('status', 'menunggu')
                ->count(),

            'disetujui' => Pendaftaran::where('status', 'disetujui')
                ->count(),

            'ditolak' => Pendaftaran::where('status', 'ditolak')
                ->count(),

            'aula' => Aula::count(),
        ];

        return view('admin.dashboard', [
            'user' => Auth::user(),
            'stats' => $stats,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | RIWAYAT PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function history(Request $request)
    {
        $status = $request->query('status');


        $query = Pendaftaran::with([
            'user',
            'aula'
        ]);


        /*
        | FILTER STATUS
        */

        if (in_array($status, [
            'menunggu',
            'disetujui',
            'ditolak',
            'dibatalkan'
        ])) {

            $query->where('status', $status);

        } else {

            $status = 'semua';

        }


        $pendaftarans = $query
            ->latest()
            ->get();


        return view('admin.history', [
            'user' => Auth::user(),
            'pendaftarans' => $pendaftarans,
            'statusAktif' => $status,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function show(Pendaftaran $pendaftaran)
    {
        $pendaftaran->load([
            'user',
            'aula'
        ]);

        return view('admin.pendaftaran.show', [
            'user' => Auth::user(),
            'pendaftaran' => $pendaftaran,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | DATA AULA
    |--------------------------------------------------------------------------
    */

    public function aulas()
    {
        $aulas = Aula::latest()->get();

        return view('admin.aulas.index', [
            'user' => Auth::user(),
            'aulas' => $aulas,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | TAMBAH AULA (FORM)
    |--------------------------------------------------------------------------
    */

    public function createAula()
    {
        return view('admin.aulas.create', [
            'user' => Auth::user(),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN AULA BARU
    |--------------------------------------------------------------------------
    */

    public function storeAula(Request $request)
    {
        $validated = $request->validate([
            'nama_aula' => ['required', 'string', 'max:255'],
            'kapasitas' => ['required', 'integer', 'min:1'],
            'keterangan' => ['required', 'string'],
            'fasilitas' => ['nullable', 'string'],
        ], [
            'nama_aula.required' => 'Nama aula wajib diisi.',
            'nama_aula.max' => 'Nama aula maksimal 255 karakter.',
            'kapasitas.required' => 'Kapasitas aula wajib diisi.',
            'kapasitas.integer' => 'Kapasitas harus berupa angka bulat.',
            'kapasitas.min' => 'Kapasitas minimal 1 orang.',
            'keterangan.required' => 'Keterangan aula wajib diisi.',
        ]);

        Aula::create($validated);

        return redirect()
            ->route('admin.aulas')
            ->with('success', 'Data aula baru berhasil ditambahkan.');
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL AULA
    |--------------------------------------------------------------------------
    */

    public function showAula(Aula $aula)
    {
        $aula->load(['pendaftarans' => function ($query) {
            $query->latest();
        }]);

        return view('admin.aulas.show', [
            'user' => Auth::user(),
            'aula' => $aula,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT AULA (FORM)
    |--------------------------------------------------------------------------
    */

    public function editAula(Aula $aula)
    {
        return view('admin.aulas.edit', [
            'user' => Auth::user(),
            'aula' => $aula,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE AULA
    |--------------------------------------------------------------------------
    */

    public function updateAula(Request $request, Aula $aula)
    {
        $validated = $request->validate([
            'nama_aula' => ['required', 'string', 'max:255'],
            'kapasitas' => ['required', 'integer', 'min:1'],
            'keterangan' => ['required', 'string'],
            'fasilitas' => ['nullable', 'string'],
        ], [
            'nama_aula.required' => 'Nama aula wajib diisi.',
            'nama_aula.max' => 'Nama aula maksimal 255 karakter.',
            'kapasitas.required' => 'Kapasitas aula wajib diisi.',
            'kapasitas.integer' => 'Kapasitas harus berupa angka bulat.',
            'kapasitas.min' => 'Kapasitas minimal 1 orang.',
            'keterangan.required' => 'Keterangan aula wajib diisi.',
        ]);

        $aula->update($validated);

        return redirect()
            ->route('admin.aulas')
            ->with('success', 'Data aula berhasil diperbarui.');
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS AULA
    |--------------------------------------------------------------------------
    */

    public function destroyAula(Aula $aula)
    {
        // Proteksi: jangan hapus jika masih memiliki pendaftaran aktif (menunggu atau disetujui)
        if ($aula->pendaftarans()->whereIn('status', ['menunggu', 'disetujui'])->exists()) {
            return redirect()
                ->route('admin.aulas')
                ->with('error', 'Aula tidak dapat dihapus karena masih memiliki pengajuan pendaftaran aktif (menunggu/disetujui).');
        }

        $aula->delete();

        return redirect()
            ->route('admin.aulas')
            ->with('success', 'Data aula berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | SETUJUI PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function approve(
        Request $request,
        Pendaftaran $pendaftaran
    ) {
        $data = $request->validate([
            'catatan_admin' => [
                'nullable',
                'string',
            ],
        ]);


        /*
        | Cek bentrok jadwal
        */

        $bentrok = Pendaftaran::where(
                'id',
                '!=',
                $pendaftaran->id
            )
            ->where(
                'aula_id',
                $pendaftaran->aula_id
            )
            ->where(
                'tanggal',
                $pendaftaran->tanggal
            )
            ->where(
                'status',
                'disetujui'
            )
            ->where(function ($query) use ($pendaftaran) {

                $query->where(
                    'jam_mulai',
                    '<',
                    $pendaftaran->jam_selesai
                )
                ->where(
                    'jam_selesai',
                    '>',
                    $pendaftaran->jam_mulai
                );

            })
            ->exists();


        if ($bentrok) {

            return back()->with(
                'error',
                'Pendaftaran tidak dapat disetujui karena jadwal aula sudah digunakan oleh pendaftaran lain.'
            );
        }


        $pendaftaran->update([
            'status' => 'disetujui',
            'catatan_admin' =>
                $data['catatan_admin'] ?? null,
        ]);


        return back()->with(
            'success',
            'Pendaftaran berhasil disetujui.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | TOLAK PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function reject(
        Request $request,
        Pendaftaran $pendaftaran
    ) {
        $data = $request->validate([
            'catatan_admin' => [
                'required',
                'string',
            ],
        ], [
            'catatan_admin.required' =>
                'Catatan wajib diisi ketika menolak pendaftaran.',
        ]);


        $pendaftaran->update([
            'status' => 'ditolak',
            'catatan_admin' =>
                $data['catatan_admin'],
        ]);


        return back()->with(
            'success',
            'Pendaftaran berhasil ditolak.'
        );
    }
}