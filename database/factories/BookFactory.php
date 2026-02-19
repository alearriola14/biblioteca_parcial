<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalCopies = fake()->numberBetween(1, 15);
        $availableCopies = fake()->numberBetween(0, $totalCopies);
       //estadoCopias = $availableCopies > 0 ? "disponible" : "no disponible";

        return [
            'titulo' => fake()->sentence(fake()->numberBetween(2, 6)),
            'descripcion' => fake()->paragraph(fake()->numberBetween(1, 3)),
            'isbn' => fake()->unique()->isbn13(),
            'copias_totales' => $totalCopies,
            'copias_disponibles' => $availableCopies,
            'estado' => fake()->boolean(),
        ];
    }
}
