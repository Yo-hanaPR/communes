<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Regions::create(
            ['id_reg' => '1',
            'descripcion' => 'Caracas Valley',
            'status'=>'A']
        );
        Regions::create(
            ['id_reg' => '2',
            'descripcion' => 'Caracas West',
            'status'=>'A']
        );
        Regions::create(
            ['id_reg' => '3',
            'descripcion' => 'Caracas North',
            'status'=>'A']
        );
    }
}
