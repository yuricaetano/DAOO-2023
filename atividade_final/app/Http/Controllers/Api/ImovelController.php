<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImovelRequest;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Mockery\Exception;

class ImovelController extends Controller
{
    public function index(Request $request){
        $perPage = $request->query('per_page');
        $imovelsPaginated = Imovel::paginate($perPage);
        $imovelsPaginated->appends([
            'per_page' => $perPage
        ]);
        return response()->json($imovelsPaginated);
    }

    public function show($id){
        try {
            return response()->json(Imovel::findOrFail($id));
        } catch (\Exception $error) {
            $responeError = [
                'Erro' => "O produto com id: $id não foi encontrado!",
                'Exeception' => $error->getMessage(),
                ];
            $statusHttp = 404;
            return response()->json($responeError, $statusHttp);
        }
}

    public function store(ImovelRequest $request){
        try {

            $newImovel = $request->all();
            $storedImovel = Imovel::create($newImovel);
            return response()->json([
                'msg'=>'Imovel inserido com sucesso!',
                'imovel'=>$storedImovel
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir novo imovel!",
                'Exception' => $error->getMessage(),
                'Debug' => $error
            ];
            $statusHttp = $error->stauts ?? 500;
            return response()->json($responseError, $statusHttp);
        }
    }
    public function update(Request $request, $id){
        try {
            $data = $request->all();
            $newImovel = Imovel::findOrFail($id);
            $newImovel->update($data);
            return response()->json([
                "msg" => "Imovel atualizado com sucesso!",
                "imovel" => $newImovel
            ]);
        } catch (Exception $error){
            return response()->json([
                'Erro' => "Erro ao inserir novo imovel!",
                'Exception' => $error->getMessage()
            ], 404);
        }
    }
    public function  remove($id){
        try {
            if(Imovel::findOrFail($id)->delete());
            return response()->json(["msg"=>"Imovel com id:$id removido!"]);
        } catch (Exception $error) {
            return response()->json([
                'Erro' => "Erro ao excluir imovel!",
                'Exception' => $error->getMessage()
            ], 404);
        }
    }
}
