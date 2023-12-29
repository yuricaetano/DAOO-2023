<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Roommate;
use Illuminate\Http\Request;

class RoommateController extends Controller
{
   private $roommate;
   public function  __construct(Roommate $roommate){
       $this->roommate = $roommate;
   }
    public function index()
    {
        return $this->roommate->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 500;
        try {
            if(!$request->user()->tokenCan('is-admin')){
                $statusHttp = 403;
                throw new \Exception('voce nao tem permissao');
            }
            $updatedroommate = $request->all();
            $storedClient = roommate::create($updatedroommate);
            return response()->json([
                'Message'=> 'roommate inserido com sucesso!',
                'roommate' => $this->roommate->create($request->all())
            ]);
        } catch (\Exception $error){
            $responseError = [
                'Erro' => "Erro ao inserir novo roommate",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(roommate $roommate)
    {
        return $roommate;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, roommate $roommate)
    {
        try {
            $roommate->update($request->all());
            return response()->json([
                "msg" => "roommate atualizado com sucesso!",
                "roommate" => $roommate

            ]);
        } catch (Exception $error){
            $responseError = [
                'Erro' => "Erro ao atualizar roommate",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(roommate $roommate)
    {
        try {
            if($roommate->delete())
            return response()->json(["Message"=>"roommate $roommate removido!"
            ,"roommate"=>$roommate]);

        } catch (Exception $error) {
            return response()->json([
                'Erro' => "Erro ao excluir roommate",
                'Exception' => $error->getMessage()
            ], 404);
          }
    }

    public function roommates(roommate $roommate){
        return response()->json($roommate->load('imovels'));
    }

    public function roommatesContrato(roommate $roommate){

        $roommateComContratoEImovel = $roommate->load('contratos.imovel');

        return response()->json([
            'roommateComContratoEImovel' => $roommateComContratoEImovel,
        ]);
    }
}
