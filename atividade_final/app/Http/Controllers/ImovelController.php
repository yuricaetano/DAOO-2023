<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ImovelController extends Controller {

    public function index()
    {
        //$model = new Imovels();
        //dd($model->all());
        //return response()->json($model->find(111));
        $collectionImovels = Imovel::all();
        return view('imovels.index', ['listImovels' => $collectionImovels, 'totalProds' => $collectionImovels->count()]);
    }

    public function show($id): View
    {
        //dump(Imovels::find($id));
        return view('imovels.show', ['imovel' => Imovel::find($id)]);
    }

    public function create(): View
    {
        return view('imovels.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $newImovel = $request->all();

        if (!Imovel::create($newImovel)) {
            dd("Erro ao inserir o novo imovel");

        }
        return redirect('/imovels');

    }

    public function edit($id): View
    {
        $imovel = Imovel::find($id);
        if (!$imovel)
            dd("Imovel não encontrado");
        return view('imovels.edit', ['imovel' => $imovel]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $updatedImovel = $request->all();
        if (!Imovel:: find($id)->update($updatedImovel))
            dd("Erro ao atualizar imovel $id!!");
        return redirect('/imovels');
    }

    public function delete($id): View
    {
        $imovel = Imovel::find($id);
        if (!$imovel)
            dd("Imovels não encontrado");
        return view('imovels.delete', ['imovel' => $imovel]);
    }

    public function remove($id): RedirectResponse
    {
        if (!Imovel::destroy($id))
            dd("Erro ao deletar o imovel");
        return redirect('/imovels');
    }

}
