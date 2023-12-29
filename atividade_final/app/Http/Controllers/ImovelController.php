<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ImovelController extends Controller {

    public function index()
    {
        //$model = new imoveis();
        //dd($model->all());
        //return response()->json($model->find(111));
        $collectionimoveis = Imovel::all();
        return view('imoveis.index', ['listimoveis' => $collectionimoveis, 'totalProds' => $collectionimoveis->count()]);
    }

    public function show($id): View
    {
        //dump(imoveis::find($id));
        return view('imoveis.show', ['imovel' => Imovel::find($id)]);
    }

    public function create(): View
    {
        return view('imoveis.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $newImovel = $request->all();

        if (!Imovel::create($newImovel)) {
            dd("Erro ao inserir o novo imovel");

        }
        return redirect('/imoveis');

    }

    public function edit($id): View
    {
        $imovel = Imovel::find($id);
        if (!$imovel)
            dd("Imovel não encontrado");
        return view('imoveis.edit', ['imovel' => $imovel]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $updatedImovel = $request->all();
        if (!Imovel:: find($id)->update($updatedImovel))
            dd("Erro ao atualizar imovel $id!!");
        return redirect('/imoveis');
    }

    public function delete($id): View
    {
        $imovel = Imovel::find($id);
        if (!$imovel)
            dd("imoveis não encontrado");
        return view('imoveis.delete', ['imovel' => $imovel]);
    }

    public function remove($id): RedirectResponse
    {
        if (!Imovel::destroy($id))
            dd("Erro ao deletar o imovel");
        return redirect('/imoveis');
    }

}
