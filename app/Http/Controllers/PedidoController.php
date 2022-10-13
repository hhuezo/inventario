<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;

class PedidoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::get();
		return $clientes;
        return view('pedido.index', ['clientes' => $clientes]);
        dd($clientes);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $productos = Producto::get();
        return view('pedido.edit', ['cliente' => Cliente::findOrFail($id),'productos'=>$productos]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
