<?php
namespace App\Http\Controllers;

use App\Models\Captura;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CapturaController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->has('per_page') ? $request->per_page : 10;
        $tipo = $request->has('tipo') ? $request->tipo : 'Oficina';

        $captura = Captura::orderBy('created_at', 'desc');
        if ($request->has('search')) {
        }

        $captura->whereTipo($tipo);

        return response()->json($captura->paginate($per_page), 200);
    }

    public function store(Request $request)
    {
        $captura = new Captura;
        $captura->medidor_id = $request->medidor_id;
        $captura->captura_inicial = $request->captura;
        $captura->tipo = "Oficina";
        $captura->fecha_hora_inicial = Carbon::now()->toDateTimeString();

        $captura_anterior = Captura::whereMedidorId($request->medidor_id)
          ->whereTipo('Fuera')
          ->whereNull('consumo')
          ->first();
        $captura_anterior->captura_final = $request->captura;
        $captura_anterior->consumo = $request->captura - $captura_anterior->captura_inicial;
        $captura_anterior->fecha_hora_final = Carbon::now()->toDateTimeString();

        if (! ($captura->save() && $captura_anterior->save()) ) {
            abort(500, 'Captura no creada.');
        }
        return response()->json($captura, 201);
    }

    public function show($id)
    {
        $captura = Captura::find($id);
        if (! $captura) {
            abort(404, 'Captura no encontrada');
        }
        return $captura;
    }

    public function update(Request $request, $id)
    {
        $captura = $this->show($id);
        $captura->captura_final = $request->captura;
        $captura->consumo = $request->captura - $captura->captura_inicial;
        $captura->fecha_hora_final = Carbon::now()->toDateTimeString();

        $captura_posterior = new Captura;
        $captura_posterior->medidor_id = $request->medidor_id;
        $captura_posterior->captura_inicial = $request->captura;
        $captura->tipo = "Fuera";
        $captura_posterior->fecha_hora_inicial = Carbon::now()->toDateTimeString();

        if (!($captura->save() && $captura_posterior->save())) {
            abort(500, 'Captura no actualizada.');
        }

        return response()->json($captura, 200);
    }
}
