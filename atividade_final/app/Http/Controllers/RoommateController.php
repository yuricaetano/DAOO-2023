<?php

namespace App\Http\Controllers;

use App\Models\Roommate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoommateController extends Controller
{
    public function index()
    {
        $collectionRoommates = Roommate::all();
        return view('roommate.index', ['listRoommates' => $collectionRoommates, 'totalProds' => $collectionRoommates->count()]);
    }

    public function show($id): View
    {
        return view('roommates.show', ['roommate' => Roommate::find($id)]);
    }

    public function create(): View
    {
        return view('roommates.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $newCliente = $request->all();

        if (!Cliente::create($newCliente)) {
            dd("Erro ao inserir o novo roommate");

        }
        return redirect('/roommates');

    }

    public function edit($id): View
    {
        $roommate = Roommate::find($id);
        if (!$roommate)
            dd("Roommate não encontrado");
        return view('roommates.edit', ['roommate' => $roommate]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $updatedRoommate = $request->all();
        if (!Roommate:: find($id)->update($updatedRoommate))
            dd("Erro ao atualizar roommate $id!!");
        return redirect('/roommates');
    }

    public function delete($id): View
    {
        $roommate = Roommate::find($id);
        if (!$roommate)
            dd("Roommate não encontrado");
        return view('roommates.delete', ['roommate' => $roommate]);
    }

    public function remove($id): RedirectResponse
    {
        if (!Roommate::destroy($id))
            dd("Erro ao deletar o roommate");
        return redirect('/roommates');
    }
}
