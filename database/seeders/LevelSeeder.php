<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
            'id'=> '1',
            'level'=> 'mudah',
            'pengerjaan'=> '1 Bulan',
            'perbaikan' => '1 minggu',
            ],
            [
            'id' => '2',
            'level' => 'menengah',
            'pengerjaan' => '2 Bulan',
            'perbaikan' => '2 minggu',
            ],
             [
            'id' => '3',
            'level' => 'sulit',
            'pengerjaan' => '3 bulan',
            'perbaikan' => '1 bulan',
            ]
        ];
        Level::insert($levels);
    }
}
