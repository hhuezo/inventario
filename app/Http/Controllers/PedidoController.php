<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class PedidoController extends Controller
{
    public function index()
    {
        // $clientes = Cliente::get();
        // dd($clientes);

        $pedidos = Pedido::all();
        return view('pedido.index', ['pedidos' => $pedidos]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        // $productos = Producto::all();
        return view('pedido.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $pedido = new Pedido;
        $pedido->Cliente = $request->get('Cliente');
        $pedido->FechaDespacho = $request->get('FechaDespacho');
        $pedido->save();
        //  alert()->success(' correctamente');
        return Redirect::to('pedido/' . $pedido->Id . '/edit');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $productos = Producto::get();
        $detalle = DetallePedido::where('Pedido', '=', $id)->get();
        return view('pedido.edit', ['detalle' => $detalle, 'pedido' => Pedido::findOrFail($id), 'productos' => $productos]);
    }

    public function update(Request $request, $id)
    {
        $detalle = new DetallePedido;
        $detalle->Producto = $request->get('Producto');
        $detalle->Pedido = $id;
        $detalle->Cantidad = $request->get('Cantidad');
        $detalle->save();
        return Redirect::to('pedido/' . $id . '/edit');
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return Redirect::to('pedido.index');
    }

    public function eliminar_producto(Request $request)
    {

        $detalle = DetallePedido::findOrFail($request->get('Id'));
        $detalle->delete();
        return Redirect::to('pedido/' . $request->get('Pedido') . '/edit');
    }
}
