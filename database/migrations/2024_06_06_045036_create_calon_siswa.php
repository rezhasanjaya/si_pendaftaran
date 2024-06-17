<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calon_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('jurusan_id');
            $table->string('no_pendaftaran');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('asal_sekolah');
            $table->float('nilai_bahasa_inggris');
            $table->float('nilai_matematika');
            $table->float('nilai_bahasa_indonesia');
            $table->float('nilai_ilmu_pengetahuan_alam');
            $table->float('nem_smp');
            $table->string('nama_orang_tua');
            $table->string('alamat_orang_tua');
            $table->string('pendidikan_terakhir_orang_tua');
            $table->string('pekerjaan');
            $table->string('nomor_telepon_orang_tua');
            $table->string('nomor_telepon_siswa');
            $table->string('ijazah');
            $table->string('skhu');
            $table->string('foto');
            $table->boolean('lolos_dokumen')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_siswa');
    }
};
