<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- PENTING: Tambahkan ini

class KenanganKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kenangan_keluarga')->insert([
            [
                'judul' => 'Liburan Keluarga ke Pantai',
                'keterangan' => 'Momen saat kita semua pergi ke pantai Anyer dan membangun istana pasir bersama.',
                'tanggal' => '2023-06-15',
                'keluarga' => 'Semua',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Ayah Mengajari Bersepeda',
                'keterangan' => 'Hari pertama kali Ayah melepas roda bantu dan aku berhasil seimbang.',
                'tanggal' => '2010-03-20',
                'keluarga' => 'Ayah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Resep Kue Kering Ibu',
                'keterangan' => 'Setiap Lebaran, kue nastar buatan Ibu selalu jadi rebutan. Ini adalah kenangan termanis.',
                'tanggal' => '2023-04-22',
                'keluarga' => 'Ibu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Proyek Coding Pertama',
                'keterangan' => 'Saat pertama kali berhasil membuat website sederhana dan menunjukkannya ke keluarga.',
                'tanggal' => '2020-08-17',
                'keluarga' => 'Haikal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
