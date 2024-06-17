<?php

namespace App\Models;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalonSiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'calon_siswa';
    protected $softDelete = true;
    
    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'alamat',
        'nomor_telepon_siswa',
        'nem_smp',
        'nilai_bahasa_inggris',
        'nilai_matematika',
        'nilai_bahasa_indonesia',
        'nilai_ilmu_pengetahuan_alam',
        'nama_orang_tua',
        'pekerjaan',
        'pendidikan_terakhir_orang_tua',
        'alamat_orang_tua',
        'nomor_telepon_orang_tua',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
}
