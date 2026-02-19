<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    protected $fillable = [
        'nombre_solicitante',
        'fecha_hora_prestamo',
        'referencia',
        'book_id',
    ];

    protected $casts = [
        'fecha_hora_prestamo' => 'datetime',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
