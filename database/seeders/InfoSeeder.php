<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Info;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = Info::create(
            [
                'titles' => 'Judul Pesan 1',
                'messages' => 'Isi Pesan Satu',
                'images' => 'dist/img/user1-128x128.jpg',
            ]);
        $info = Info::create(
            [
                'titles' => 'Judul Pesan 2',
                'messages' => 'Isi Pesan Dua',
                'images' => 'dist/img/user1-128x128.jpg',
            ]);
    }
}
