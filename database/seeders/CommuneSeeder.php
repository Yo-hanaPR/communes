<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Communes;
class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Communes::create(
            [
                'id_com'=>'1',
                'id_reg' => '1',
                'description' => 'Commune Gerald',
                'status'=>'A']
        );

        Communes::create(
            [
                'id_com'=>'2',
                'id_reg' => '2',
                'description' => 'Commune Martin',
                'status'=>'A']
        );
    }
}
