<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContratoController extends Controller
{
    public function index(){
        //$model = new Contratos();
        //dd($model->all());
        //return response()->json($model->find(111));
        $collectionContratos = Contrato::all();
        return view('contratos.index',['listContratos'=> $collectionContratos,'totalProds'=> $collectionContratos->count()]);
    }

    public function show($id) : View {
        //dump(Contratos::find($id));
        return view('contratos.show', ['contrato'=>Contrato::find($id)]);
    }

    public function create(): View{
        return view('contratos.create');
    }
    public function store(Request $request): RedirectResponse{
        $newContrato = $request->all();

        if (!Contrato::create($newContrato)){
            dd("Erro ao inserir o novo contrato");

        }
        return redirect('/contratos');

    }

    public function edit($id): View{
        $contrato = Contrato::find($id);
        if (!$contrato)
            dd("Contrato não encontrado");
        return view('contratos.edit', ['contrato'=>$contrato]);
    }

    public function update(Request $request, $id): RedirectResponse{
        $updatedContrato = $request->all();
        if (!Contrato:: find($id)->update($updatedContrato))
            dd("Erro ao atualizar contrato $id!!");
        return redirect('/contratos');
    }

    public function delete($id): View{
        $contrato = Contrato::find($id);
        if (!$contrato)
            dd("Contratos não encontrado");
        return view('contratos.delete', ['contrato'=>$contrato]);
    }

    public function remove($id): RedirectResponse{
        if(!Contrato::destroy($id))
            dd("Erro ao deletar o contrato");
        return redirect('/contratos');
    }

}


