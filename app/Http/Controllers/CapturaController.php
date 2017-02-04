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

        return $captura->paginate($per_page);
    }

    public function store(Request $request)
    {
        $captura = new Captura;
        $captura->medidor_id = $request->medidor_id;
        $captura->captura_inicial = $request->captura;
        $captura->fecha_hora_inicial = Carbon::now()->toDateTimeString();
        if (! $raspberry->save()) {
            abort(500, 'Captura no creada.');
        }
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
        $captura->fecha_hora_final = Carbon::now()->toDateTimeString();
        if (!$captura->save()) {
            abort(500, 'Captura no actualizada.');
        }
    }
}
