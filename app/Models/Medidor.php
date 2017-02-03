<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medidor extends Model
{
    protected $table = 'medidores';

    public function capturas()
    {
        return $this->hasMany(Captura::class, 'medidor_id');
    }
}