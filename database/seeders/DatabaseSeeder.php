<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // libros 
        $this->call([
            BooksSeeder::class,
        ]);

        DB::table('loans')->insert([
            'nombre_solicitante' => 'Juan Pérez',
            'fecha_hora_prestamo' => now(),
            'referencia' => 'prestamo-001',
            'book_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Usuario de prueba (opcional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
