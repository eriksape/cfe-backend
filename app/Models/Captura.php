<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Captura extends Model
{
    protected $table = 'capturas';
    protected $fillable = ['medidor_id', 'captura_inicial', 'fecha_hora_inicial', 'captura_final', 'fecha_hora_final', 'consumo', 'tipo'];

    public function medidor()
    {
        return $this->belongsTo(Medidor::class, 'medidor_id');
    }

    public function diferencia()
    {
        $consumo = $this->captura_final - $this->captura_inicial;
        return $this->attributes['consumo'] = $consumo;
    }
}
