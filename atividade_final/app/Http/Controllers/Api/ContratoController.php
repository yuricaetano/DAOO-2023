<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    private $contrato;
    public function __construct(Contrato $contrato){
        $this->contrato = $contrato;
    }
    public function index()
    {
        return $this->contrato->all();
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'descricao' => 'required | min:6',
                'valor' => 'required | numeric | min:1.99'
            ]);
            return response()->json([
                'Message'=> 'Contrato inserido com sucesso!',
                'Contrato' => $this->contrato->create($request->all())
            ]);
        } catch (\Exception $error){
            $responseError = [
                'Erro' => "Erro ao inserir novo contrato",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }


    public function show(Contrato $contrato)
    {
        return $contrato;
    }


    public function update(Request $request, Contrato $contrato)
    {
        try {
            $contrato->update($request->all());
            return response()->json([
                "msg" => 'Contrato atualizado com sucesso',
                "Contrato" => $contrato
            ]);
        } catch (\Exception $error){
            $responseError = [
                'Erro' => "Erro ao atualizar contrato",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function destroy(Contrato $contrato)
    {
        try {
            if($contrato->delete())
            return response()->json(["Message"=>"Contrato removido com sucesso","Contrato"=>$contrato]);
        } catch (\Exception $error){
            return response()->json([
                'Erro' => "Erro ao excluir contrato",
                'Exception' => $error->getMessage()
            ], 404);
        }

    }


}
