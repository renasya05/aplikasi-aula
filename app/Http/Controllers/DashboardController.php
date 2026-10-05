<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK PENDAFTARAN USER
        |--------------------------------------------------------------------------
        */

        $totalPendaftaran = Pendaftaran::where(
            'user_id',
            $user->id
        )->count();

        $menunggu = Pendaftaran::where(
            'user_id',
            $user->id
        )
            ->where('status', 'menunggu')
            ->count();

        $disetujui = Pendaftaran::where(
            'user_id',
            $user->id
        )
            ->where('status', 'disetujui')
            ->count();

        $ditolak = Pendaftaran::where(
            'user_id',
            $user->id
        )
            ->where('status', 'ditolak')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | BULAN YANG DITAMPILKAN
        |--------------------------------------------------------------------------
        */

        $bulan = $request->input('bulan');

        try {
            $awalBulan = $bulan
                ? Carbon::createFromFormat('Y-m', $bulan)->startOfMonth()
                : now()->startOfMonth();
        } catch (\Throwable $e) {
            $awalBulan = now()->startOfMonth();
        }

        $akhirBulan = $awalBulan->copy()->endOfMonth();

        $bulanSebelumnya = $awalBulan
            ->copy()
            ->subMonth()
            ->format('Y-m');

        $bulanBerikutnya = $awalBulan
            ->copy()
            ->addMonth()
            ->format('Y-m');

        $judulBulan = $awalBulan->translatedFormat('F Y');


        /*
        |--------------------------------------------------------------------------
        | DATA AULA
        |--------------------------------------------------------------------------
        */

        $aulas = Aula::orderBy('nama_aula')->get();


        /*
        |--------------------------------------------------------------------------
        | PENDAFTARAN YANG MEMPENGARUHI KETERSEDIAAN
        |--------------------------------------------------------------------------
        |
        | Status menunggu dan disetujui dianggap memakai jadwal.
        |
        */

        $pendaftarans = Pendaftaran::with('aula')
            ->whereIn('status', [
                'menunggu',
                'disetujui',
            ])
            ->whereNotNull('tanggal_mulai')
            ->whereNotNull('tanggal_selesai')
            ->whereDate(
                'tanggal_mulai',
                '<=',
                $akhirBulan
            )
            ->whereDate(
                'tanggal_selesai',
                '>=',
                $awalBulan
            )
            ->whereIn('kriteria_waktu', [
                'pagi_siang',
                'siang_sore',
                'malam',
            ])
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA JADWAL
        |--------------------------------------------------------------------------
        |
        | Bentuk:
        |
        | $jadwal[aula_id][tanggal] = [
        |     'pagi_siang',
        |     'siang_sore'
        | ];
        |
        */

        $jadwal = [];
        $detailJadwal = [];

        foreach ($aulas as $aula) {
            $jadwal[$aula->id] = [];
            $detailJadwal[$aula->id] = [];
        }


        /*
        |--------------------------------------------------------------------------
        | ISI JADWAL PER HARI
        |--------------------------------------------------------------------------
        */

        foreach ($pendaftarans as $pendaftaran) {
            $mulai = Carbon::parse(
                $pendaftaran->tanggal_mulai
            )->startOfDay();

            $selesai = Carbon::parse(
                $pendaftaran->tanggal_selesai
            )->startOfDay();


            /*
            |--------------------------------------------------------------------------
            | Batasi ke bulan yang sedang dilihat
            |--------------------------------------------------------------------------
            */

            $mulaiEfektif = $mulai->lessThan($awalBulan)
                ? $awalBulan->copy()
                : $mulai;

            $selesaiEfektif = $selesai->greaterThan($akhirBulan)
                ? $akhirBulan->copy()
                : $selesai;


            /*
            |--------------------------------------------------------------------------
            | Loop setiap tanggal
            |--------------------------------------------------------------------------
            */

            for (
                $tanggal = $mulaiEfektif->copy();
                $tanggal->lte($selesaiEfektif);
                $tanggal->addDay()
            ) {
                $tanggalKey = $tanggal->format('Y-m-d');

                $aulaId = $pendaftaran->aula_id;

                $kriteria = $pendaftaran->kriteria_waktu;


                /*
                |--------------------------------------------------------------------------
                | JADWAL
                |--------------------------------------------------------------------------
                */

                if (
                    !isset(
                        $jadwal[$aulaId][$tanggalKey]
                    )
                ) {
                    $jadwal[$aulaId][$tanggalKey] = [];
                }

                $jadwal[$aulaId][$tanggalKey][] = $kriteria;


                /*
                |--------------------------------------------------------------------------
                | DETAIL JADWAL
                |--------------------------------------------------------------------------
                */

                if (
                    !isset(
                        $detailJadwal[$aulaId][$tanggalKey]
                    )
                ) {
                    $detailJadwal[$aulaId][$tanggalKey] = [];
                }

                $namaWaktu = [
                    'pagi_siang' =>
                        'Pagi – Siang (08.00–13.00)',

                    'siang_sore' =>
                        'Siang – Sore (14.00–16.00)',

                    'malam' =>
                        'Malam (18.00–21.00)',
                ];


                $detailJadwal[
                    $aulaId
                ][$tanggalKey][$kriteria] = [
                    'nama_aula' =>
                        $pendaftaran->aula?->nama_aula
                        ?? '-',

                    'tanggal' =>
                        $tanggal->translatedFormat(
                            'd F Y'
                        ),

                    'waktu' =>
                        $namaWaktu[$kriteria]
                        ?? '-',

                    'nama_pemohon' =>
                        $pendaftaran->nama_pemohon
                        ?? '-',

                    'nip' =>
                        $pendaftaran->nip
                        ?? '-',

                    'jabatan' =>
                        $pendaftaran->jabatan
                        ?? '-',

                    'instansi' =>
                        $pendaftaran->instansi
                        ?? '-',

                    'unit_organisasi' =>
                        $pendaftaran->unit_organisasi
                        ?? '-',

                    'bagian_seksi' =>
                        $pendaftaran->bagian_seksi
                        ?? '-',

                    'jumlah_peserta' =>
                        $pendaftaran->jumlah_peserta
                        ?? 0,

                    'keperluan' =>
                        $pendaftaran->keperluan
                        ?? '-',

                    'status' =>
                        $pendaftaran->status,
                ];
            }
        }


        /*
        |--------------------------------------------------------------------------
        | HILANGKAN DUPLIKAT KRITERIA
        |--------------------------------------------------------------------------
        */

        foreach (
            $jadwal as $aulaId => $tanggalData
        ) {
            foreach (
                $tanggalData as $tanggalKey => $kriteriaData
            ) {
                $jadwal[$aulaId][$tanggalKey] =
                    array_values(
                        array_unique(
                            $kriteriaData
                        )
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | VIEW DASHBOARD PENGGUNA
        |--------------------------------------------------------------------------
        */

        return view(
            'dashboard',
            compact(
                'totalPendaftaran',
                'menunggu',
                'disetujui',
                'ditolak',
                'aulas',
                'awalBulan',
                'akhirBulan',
                'bulanSebelumnya',
                'bulanBerikutnya',
                'judulBulan',
                'jadwal',
                'detailJadwal'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DAFTAR AULA
    |--------------------------------------------------------------------------
    */

    public function aulas()
    {
        $aulas = Aula::latest()->get();

        return view(
            'aulas.index',
            [
                'aulas' => $aulas,
            ]
        );
    }
}