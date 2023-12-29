<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proprietario;
use Illuminate\Http\Request;

class proprietarioController extends Controller
{
    private $proprietario;
    public function __construct(proprietario $proprietario){
        $this->proprietario = $proprietario;
    }
    public function index()
    {
        return $this->proprietario->all();
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'descricao' => 'required | min:6',
                'valor' => 'required | numeric | min:1.99'
            ]);
            return response()->json([
                'Message'=> 'proprietario inserido com sucesso!',
                'proprietario' => $this->proprietario->create($request->all())
            ]);
        } catch (\Exception $error){
            $responseError = [
                'Erro' => "Erro ao inserir novo proprietario",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }


    public function show(proprietario $proprietario)
    {
        return $proprietario;
    }


    public function update(Request $request, proprietario $proprietario)
    {
        try {
            $proprietario->update($request->all());
            return response()->json([
                "msg" => 'proprietario atualizado com sucesso',
                "proprietario" => $proprietario
            ]);
        } catch (\Exception $error){
            $responseError = [
                'Erro' => "Erro ao atualizar proprietario",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function destroy(proprietario $proprietario)
    {
        try {
            if($proprietario->delete())
            return response()->json(["Message"=>"proprietario removido com sucesso","proprietario"=>$proprietario]);
        } catch (\Exception $error){
            return response()->json([
                'Erro' => "Erro ao excluir proprietario",
                'Exception' => $error->getMessage()
            ], 404);
        }

    }


}
