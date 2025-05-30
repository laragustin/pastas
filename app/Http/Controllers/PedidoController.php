<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        // Capturamos el parámetro 'estado' de la URL (ejemplo: ?estado=pendiente)
        $estado = $request->query('estado');

        // Iniciamos la consulta con los pedidos y la relación productos.producto para detalles
        $query = Pedido::with('productos.producto')->orderBy('created_at', 'desc');

        // Si viene un filtro estado, aplicamos la condición
        if ($estado) {
            $query->where('estado', $estado);
        }

        // Ejecutamos la consulta
        $pedidos = $query->get();

        // Retornamos la vista con los pedidos y el estado seleccionado
        return view('pedidos.index', compact('pedidos', 'estado'));
    }

  
    public function aceptar(Pedido $pedido)
{
    $pedido->update(['estado' => 'aceptado']);
    return redirect()->route('pedidos.index')->with('success', 'Pedido aceptado');
}

    public function rechazar(Pedido $pedido)
{
    $pedido->update(['estado' => 'rechazado']);
    return redirect()->route('pedidos.index')->with('success', 'Pedido rechazado');
}
}
