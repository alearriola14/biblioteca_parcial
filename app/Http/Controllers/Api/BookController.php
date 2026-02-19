<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * Filtros: titulo, isbn, estado
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Filtro por título (búsqueda parcial, case-insensitive)
        if ($request->has('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        // Filtro por ISBN (búsqueda exacta)
        if ($request->has('isbn')) {
            $query->where('isbn', $request->isbn);
        }

        // Filtro por estado (booleano)
        if ($request->has('estado')) {
            $estado = filter_var($request->estado, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if ($estado !== null) {
                $query->where('estado', $estado);
            }
        }

        // Obtener los resultados paginados
        $books = $query->paginate(15);

        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
