<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Menampilkan halaman verifikasi lokasi.
     */
    public function verify(Aula $aula)
    {
        return view('location.verify', compact('aula'));
    }

    /**
     * Memeriksa lokasi user.
     */
    public function check(Request $request, Aula $aula)
    {
        $validated = $request->validate([
            'latitude' => [
                'required',
                'numeric',
                'between:-90,90',
            ],
            'longitude' => [
                'required',
                'numeric',
                'between:-180,180',
            ],
        ]);

        $officeLatitude = config('location.latitude');
        $officeLongitude = config('location.longitude');
        $radius = (float) config('location.radius', 100);

        /*
        |--------------------------------------------------------------------------
        | Pastikan konfigurasi lokasi tersedia
        |--------------------------------------------------------------------------
        */

        if (
            $officeLatitude === null ||
            $officeLatitude === '' ||
            $officeLongitude === null ||
            $officeLongitude === ''
        ) {
            return back()->with(
                'error',
                'Koordinat lokasi kantor belum dikonfigurasi.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Hitung jarak
        |--------------------------------------------------------------------------
        */

        $distance = $this->calculateDistance(
            (float) $validated['latitude'],
            (float) $validated['longitude'],
            (float) $officeLatitude,
            (float) $officeLongitude
        );

        /*
        |--------------------------------------------------------------------------
        | Jika di luar radius
        |--------------------------------------------------------------------------
        */

        if ($distance > $radius) {
            session()->forget([
                'location_verified',
                'location_verified_at',
                'location_distance',
                'location_aula_id',
            ]);

            return back()->with(
                'error',
                'Lokasi Anda berada di luar radius kantor. Jarak Anda sekitar '
                . round($distance, 2)
                . ' meter. Pendaftaran hanya dapat dilakukan dalam radius '
                . $radius
                . ' meter.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Jika lokasi valid
        |--------------------------------------------------------------------------
        */

        session([
            'location_verified' => true,
            'location_verified_at' => now()->toDateTimeString(),
            'location_distance' => round($distance, 2),
            'location_aula_id' => $aula->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Masuk ke form pendaftaran
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('pendaftaran.create', [
                'aula' => $aula->id,
            ])
            ->with(
                'success',
                'Lokasi berhasil diverifikasi. Silakan lanjutkan pengisian pendaftaran.'
            );
    }

    /**
     * Menghitung jarak menggunakan rumus Haversine.
     *
     * Hasil dalam meter.
     */
    private function calculateDistance(
        float $latitude1,
        float $longitude1,
        float $latitude2,
        float $longitude2
    ): float {
        $earthRadius = 6371000;

        $latitudeDifference = deg2rad(
            $latitude2 - $latitude1
        );

        $longitudeDifference = deg2rad(
            $longitude2 - $longitude1
        );

        $a =
            sin($latitudeDifference / 2) ** 2
            +
            cos(deg2rad($latitude1))
            *
            cos(deg2rad($latitude2))
            *
            sin($longitudeDifference / 2) ** 2;

        $c =
            2 *
            atan2(
                sqrt($a),
                sqrt(1 - $a)
            );

        return $earthRadius * $c;
    }
}