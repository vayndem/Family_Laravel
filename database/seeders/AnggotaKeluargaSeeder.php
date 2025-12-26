<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaKeluargaSeeder extends Seeder
{
    public function run(): void
    {
        // Kita simpan data dalam array terlebih dahulu
        $keluarga = [
            // TINGKATAN 1
            [
                'nama' => 'Muhammad Rofiq',
                'deskripsi' => 'Kepala Keluarga / Kakek',
                'tingkatan' => 1,
                'urutan' => 1,
            ],
            [
                'nama' => 'Ika Agustina',
                'deskripsi' => 'Manajer Rumah Tangga / Nenek',
                'tingkatan' => 1,
                'urutan' => 2,
            ],
            // TINGKATAN 2
            [
                'nama' => 'Fauzan Akbar',
                'deskripsi' => 'Sang Tetua',
                'tingkatan' => 2,
                'urutan' => 3,
            ],
            [
                'nama' => 'Jessica Iskandar Isnandin',
                'deskripsi' => 'Istri Sang Tetua',
                'tingkatan' => 2,
                'urutan' => 4,
            ],
            [
                'nama' => 'Raidah Karimah',
                'deskripsi' => 'Sang Pemudi',
                'tingkatan' => 2,
                'urutan' => 5,
            ],
            [
                'nama' => 'Haikal Abror',
                'deskripsi' => 'Yang Buat Web',
                'tingkatan' => 2,
                'urutan' => 6,
            ],
            // TINGKATAN 3
            [
                'nama' => 'Kaifan Abid Atharazka',
                'deskripsi' => 'Cucu Pertama',
                'tingkatan' => 3,
                'urutan' => 7,
            ],
        ];


        foreach ($keluarga as $index => $data) {
            DB::table('anggota_keluarga')->insert([
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],
                'foto' => ($index + 1) . '.jpg',
                'tingkatan' => $data['tingkatan'],
                'urutan' => $data['urutan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
