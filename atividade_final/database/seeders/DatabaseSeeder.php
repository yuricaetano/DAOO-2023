<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        // \App\Models\User::factory(10)->create();
//        \App\Models\Cliente::factory(10)->create();
//        \App\Models\Imovel::factory(10)->create();
//        \App\Models\Contrato::factory(10)->create();
//        \App\Models\User::factory(3)->create();
        $this->call([
            UserAdminSeeder::class,
            ClienteSeeder::class,
            ImovelSeeder::class,
            ContratoSeeder::class,
        ]);
    }
}
