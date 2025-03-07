<?php

namespace Database\Seeders;

use Database\Factories\ProyectosFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyecto::factory()->count(20)->create();
    }
}
