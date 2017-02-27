<?php

namespace App\Http\Controllers;

use App\Models\Medidor;

class MedidorController extends Controller
{

    public function index(){
        return response()->json(Medidor::all());
    }
}