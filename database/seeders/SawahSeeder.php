<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sawah;

class SawahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sawah = Sawah::create(
            [
                'nosawah' => '1',
                'namasawah'=> 'sawah admin',
                'luas' => '2100',
                'lokasi' => 'Kedokan',
                'latlang' => '',
                'b_barat' => '',
                'b_utara' => '',
                'b_timur' => '',
                'b_selatan' => '',
                'namapenjual' => '',
                'hargabeli' => '200000000',
                'img' => '',
                'user_id' => '1',
            ]);

        $sawah = Sawah::create(
            [
                'nosawah' => '1',
                'namasawah'=> 'sawah user',
                'luas' => '3100',
                'lokasi' => 'Mundu',
                'latlang' => '',
                'b_barat' => '',
                'b_utara' => '',
                'b_timur' => '',
                'b_selatan' => '',
                'namapenjual' => '',
                'hargabeli' => '300000000',
                'img' => '',
                'user_id' => '2',
            ]);

        $sawah = Sawah::create(
            [
                'nosawah' => '1',
                'namasawah'=> 'sawah pro',
                'luas' => '4100',
                'lokasi' => 'Karangampel',
                'latlang' => '',
                'b_barat' => '',
                'b_utara' => '',
                'b_timur' => '',
                'b_selatan' => '',
                'namapenjual' => '',
                'hargabeli' => '400000000',
                'img' => '',
                'user_id' => '3',
            ]);
    }
}
