<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FasilitasHotel;

class FasilitasHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FasilitasHotel::create([
            'nama_fasilitas_hotel' =>'Kolam Renang',
            'foto_fasilitas_hotel' =>null,
            'deskripsi_fasilitas_hotel'=>'Kolam renang bersih dan luas',
            ]);

        FasilitasHotel::create([
            'nama_fasilitas_hotel' =>'Restoran',
            'foto_fasilitas_hotel' =>null,
            'deskripsi_fasilitas_hotel'=>'Restoran mewah yang ada di hotel',
            ]);
        FasilitasHotel::create([
            'nama_fasilitas_hotel' =>'Parkiran',
            'foto_fasilitas_hotel' =>null,
            'deskripsi_fasilitas_hotel'=>'Parkiran aman dan luas',
            ]);
        FasilitasHotel::create([
            'nama_fasilitas_hotel' =>'Gym',
            'foto_fasilitas_hotel' =>null,
            'deskripsi_fasilitas_hotel'=>'Tempat gym di hotel untuk semuanya',
        ]);
    }
}
