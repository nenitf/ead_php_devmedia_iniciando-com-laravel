<?php

namespace App\Http\Controllers;

use App\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = \App\Cliente::paginate(15);
        return view('cliente.index', compact('clientes'));
    }

    public function adicionar()
    {
        return view('cliente.adicionar');
    }

    public function salvar(Request $request)
    {
        Cliente::create($request->all());

        \Session::flash('flash_message', [
            'msg' => 'Cliente adicionado com sucesso',
            'class' => 'alert-success'
        ]);
        return redirect()->route('clientes.adicionar');
    }

    public function editar($id)
    {
        $cliente = Cliente::find($id);
        if(!$cliente){
            \Session::flash('flash_message', [
                'msg' => 'Não existe esse cliente cadastrado, adicione-o',
                'class' => 'alert-danger'
            ]);
            return redirect()->route('clientes.adicionar');
        }
        return view('cliente.editar', compact('cliente'));
    }

    public function atualizar(Request $request, $id)
    {
        $cliente = Cliente::find($id)->update($request->all());

        \Session::flash('flash_message', [
            'msg' => 'Cliente atualizado com sucesso',
            'class' => 'alert-success'
        ]);

        return redirect()->route('clientes.index');
    }
}
