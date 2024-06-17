<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Universitas;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'created_at' =>  Carbon::now(),
            'updated_at' =>  Carbon::now(),
        ]);

        $data = [
            [
                'uuid' => Str::uuid(),
                'nama_jurusan' => 'Otomasi dan Tata Kelola Perkantoran (OTKP)',
            ],
            [
                'uuid' => Str::uuid(),
                'nama_jurusan' => 'Teknik Mesin',
            ],
             [
                'uuid' => Str::uuid(),
                'nama_jurusan' => 'Akuntansi',
            ],
        ];

        foreach ($data as $item) {
            Jurusan::factory()->create($item);
        };
    }
}
