<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
      $cliente = Cliente::all();

      return view('admin.cliente.index', ['clientes' => $cliente]);
    }

    public function create()
    {
      return view('admin.cliente.index');
    }

    public function store(Request $request)
    {

      $clientes = new Cliente;
      $clientes->nome       = $request->nome;
      $clientes->cpf        = $request->cpf;
      $clientes->link       = $request->link;
      $clientes->datavenda  = $request->datavenda;
      $clientes->status     = 0;

      $clientes->save();

      $request->session()->flash('success',$clientes->nome.' cadastrado com sucesso !');
      return redirect('admin/clientes')->with('flash_message', 'Cliente cadastrado com sucesso !');
    }

    public function edit($id)
    {
      $cliente = Cliente::findOrFail($id);
      return view('admin.cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
      $cliente = Cliente::find($id);
      $cliente->fill($request->all());

      $cliente->save();

      $request->session()->flash('success', $cliente->nome.' modificado com sucesso.');
      return redirect('admin/clientes')->with('flash_message', 'Cliente alterado com sucesso !');
    }

    public function destroy($id)
    {
      $cliente = Cliente::find($id)->delete();

      return [response()->json("success"), redirect('admin/clientes')];
    }
}
