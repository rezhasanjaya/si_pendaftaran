<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MahasiswaImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        $data = Mahasiswa::find($row[2]);
        if (empty($data)) {
            return new Mahasiswa([
                'no' => $row[0],
                'tahun' => $row[1],
                'no_pendaftaran' => $row[2],
                'nama_siswa' => $row[3],
                'nik' => $row[4],
                'no_kartu_keluarga' => $row[5],
                'nik_kepala_keluarga' => $row[6],
                'nisn' => $row[7],
                'status_dtks' => $row[8],
                'no_kip' => $row[9],
                'no_kks' => $row[10],
                'asal_sekolah' => $row[11],
                'kab_kota_sekolah' => $row[12],
                'provinsi_sekolah' => $row[13],
                'tempat_lahir' => $row[14],
                'tanggal_lahir' => $row[15],
                'tahun_lahir' => $row[16],
                'usia' => $row[17],
                'jenis_kelamin' => $row[18],
                'alamat_tinggal' => $row[19],
                'no_handphone' => $row[20],
                'alamat_email' => $row[21],
                'nama_ayah' => $row[22],
                'pekerjaan_ayah' => $row[23],
                'penghasilan_ayah' => $row[24],
                'status_ayah' => $row[25],
                'nama_ibu' => $row[26],
                'pekerjaan_ibu' => $row[27],
                'penghasilan_ibu' => $row[28],
                'status_ibu' => $row[29],
                'jumlah_tanggungan' => $row[30],
                'kepemilikan_rumah' => $row[31],
                'tahun_perolehan' => $row[32],
                'sumber_listrik' => $row[33],
                'luas_tanah' => $row[34],
                'luas_bangunan' => $row[35],
                'sumber_air' => $row[36],
                'mck' => $row[37],
                'jarak_pusat_kota' => $row[38],
                'tanggal_ditetapkan' => $row[39],
                'user_penetapan' => $row[40],
                'seleksi_penetapan' => $row[41],
                'perguruan_tinggi' => $row[42],
                'program_studi' => $row[43],
                'akreditasi_prodi' => $row[44],
                'ukt_spp' => $row[45],
                'ranking_penetapan' => $row[46],
                'nim' => $row[47],
                'semester' => $row[48],
                'kategori_penetapan' => $row[49],
                'prestasi' => $row[50],
            ]);
        }
    }
}
