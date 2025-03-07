<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProyectosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $proyectos = [
        "Proyecto Horizonte",
        "Innovación Digital",
        "Redefiniendo el Futuro",
        "Conexión Global",
        "Evolución Sostenible",
        "Vanguardia Tecnológica",
        "Renovación Creativa",
        "Desarrollo Verde",
        "Transformación Integral",
        "Alma Digital",
        "Creciendo Juntos",
        "Innovación en Acción",
        "Estrategia 360",
        "Soluciones Eficientes",
        "Tecnología Responsable",
        "Pioneros del Cambio",
        "Visión del Mañana",
        "Conquista del Conocimiento",
        "Rumbo Seguro",
        "Navegando el Futuro"

    ];
        return [
            "nombre" => $proyectos[rand(0, sizeof($proyectos) - 1)],
            "horas" => $this->faker->randomNumber(2),
            "complejidad" => collect(["alta, media, baja"])->random(),
        ];
    }
}
