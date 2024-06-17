<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'pengumuman';
    protected $softDelete = true;
    protected $fillable = [
        'uuid',
        'judul',
        'isi_pengumuman',
        'is_publish',
    ];
}
