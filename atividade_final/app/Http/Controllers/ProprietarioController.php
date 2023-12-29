<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class ProprietarioController extends Controller
{
    public function index()
    {
        $collectionProprietarios = Proprietario::all();
        return view('proprietarios.index', ['listProprietarios' => $collectionProprietarios, 'totalProds' => $collectionProprietarios->count()]);
    }

    public function show($id): View
    {
        return view('proprietarios.show', ['proprietario' => Proprietario::find($id)]);
    }

    public function create(): View
    {
        return view('proprietarios.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $newProprietario = $request->all();

        if (!Proprietario::create($newProprietario)) {
            dd("Erro ao inserir o novo Proprietario");

        }
        return redirect('/proprietarios');

    }

    public function edit($id): View
    {
        $proprietario = Proprietario::find($id);
        if (!$proprietario)
            dd("Proprietario não encontrado");
        return view('proprietarios.edit', ['proprietario' => $proprietario]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $updatedProprietario = $request->all();
        if (!Proprietario:: find($id)->update($updatedProprietario))
            dd("Erro ao atualizar proprietario $id!!");
        return redirect('/proprietarios');
    }

    public function delete($id): View
    {
        $proprietario = Proprietarios::find($id);
        if (!$proprietario)
            dd("proprietarios não encontrado");
        return view('proprietario.delete', ['proprietario' => $proprietario]);
    }

    public function remove($id): RedirectResponse
    {
        if (!Proprietario::destroy($id))
            dd("Erro ao deletar o proprietario");
        return redirect('/proprietarios');
    }

}
