<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index(){
        //$model = new Clientes();
        //dd($model->all());
        //return response()->json($model->find(111));
        $collectionClientes = Cliente::all();
        return view('clientes.index',['listClientes'=> $collectionClientes,'totalClientes'=> $collectionClientes->count()]);
    }

    public function show($id) : View {
        //dump(Clientes::find($id));
        return view('clientes.show', ['cliente'=>Cliente::find($id)]);
    }

    public function create(): View{
        return view('clientes.create');
    }
    public function store(Request $request): RedirectResponse{
        $newCliente = $request->all();

        if (!Cliente::create($newCliente)){
            dd("Erro ao inserir o novo cliente");

        }
        return redirect('/clientes');

    }

    public function edit($id): View{
        $cliente = Cliente::find($id);
        if (!$cliente)
            dd("Cliente não encontrado");
        return view('clientes.edit', ['cliente'=>$cliente]);
    }

    public function update(Request $request, $id): RedirectResponse{
        $updatedCliente = $request->all();
        if (!Cliente:: find($id)->update($updatedCliente))
            dd("Erro ao atualizar cliente $id!!");
        return redirect('/clientes');
    }

    public function delete($id): View{
        $cliente = Cliente::find($id);
        if (!$cliente)
            dd("Clientes não encontrado");
        return view('clientes.delete', ['cliente'=>$cliente]);
    }

    public function remove($id): RedirectResponse{
        if(!Cliente::destroy($id))
            dd("Erro ao deletar o cliente");
        return redirect('/clientes');
    }

}

