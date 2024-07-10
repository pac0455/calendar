<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'evento';
    protected $fillable = [
        'titulo',
        'fechaHora_incio',
        'fechaHora_fin',
        'tipo_evento_id'
    ];
    public function tipo_evento()
    {
        return $this->belongsTo(TipoEvento::class);
    }

}
