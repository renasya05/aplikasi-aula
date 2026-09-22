<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'aula_id',
        'nama_pemohon',
        'nip',
        'jabatan',
        'instansi',
        'unit_organisasi',
        'email',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'jumlah_peserta',
        'peserta_pihak_luar',
        'keperluan',
        'status',
        'catatan_admin',
    ];

    /**
     * Relasi ke user/pemohon.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke aula.
     */
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}