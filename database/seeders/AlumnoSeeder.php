<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    public function run()
    {
        // Asegúrate de que estás usando el modelo Alumno correctamente
        Alumno::factory()->count(7)->create();
    }
}
