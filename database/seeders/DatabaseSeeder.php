<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // ADMIN
        // =========================

        User::updateOrCreate(
            ['email' => 'admin@aula.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // =========================
        // USER / PEMOHON
        // =========================

        User::updateOrCreate(
            ['email' => 'user@aula.test'],
            [
                'name' => 'User Demo',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        // =========================
        // AULA
        // =========================

        Aula::updateOrCreate(
            ['nama_aula' => 'Aula Besar'],
            [
                'kapasitas' => 100,
                'keterangan' => 'Aula berkapasitas besar untuk kegiatan, rapat, seminar, dan acara lainnya.',
                'fasilitas' => 'AC, Kursi, Meja, Proyektor, Sound System',
            ]
        );

        Aula::updateOrCreate(
            ['nama_aula' => 'Aula Kecil'],
            [
                'kapasitas' => 30,
                'keterangan' => 'Aula berukuran kecil untuk rapat dan kegiatan dengan jumlah peserta terbatas.',
                'fasilitas' => 'AC, Kursi, Meja, Proyektor',
            ]
        );
    }
}