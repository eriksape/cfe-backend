<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medidor extends Model
{
    protected $table = 'medidores';

    protected $appends = ['ultima_captura'];

    public function getUltimaCapturaAttribute()
    {
        $captura = Captura::whereMedidorId($this->id)->orderBy('created_at', 'desc')->first();
        return is_null($captura->captura_final)?$captura->captura_inicial:$captura->captura_final;
    }

    public function capturas()
    {
        return $this->hasMany(Captura::class, 'medidor_id');
    }
}