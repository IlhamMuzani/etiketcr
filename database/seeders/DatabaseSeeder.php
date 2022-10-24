<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(LayananSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(TiketSeeder::class);
    }
}
