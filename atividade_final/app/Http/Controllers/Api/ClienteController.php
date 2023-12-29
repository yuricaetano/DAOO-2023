<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
   private $cliente;
   public function  __construct(Cliente $cliente){
       $this->cliente = $cliente;
   }
    public function index()
    {
        return $this->cliente->all();
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
            $updatedCliente = $request->all();
            $storedClient = Cliente::create($updatedCliente);
            return response()->json([
                'Message'=> 'Cliente inserido com sucesso!',
                'Cliente' => $this->cliente->create($request->all())
            ]);
        } catch (\Exception $error){
            $responseError = [
                'Erro' => "Erro ao inserir novo cliente",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        try {
            $cliente->update($request->all());
            return response()->json([
                "msg" => "Cliente atualizado com sucesso!",
                "Cliente" => $cliente

            ]);
        } catch (Exception $error){
            $responseError = [
                'Erro' => "Erro ao atualizar cliente",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        try {
            if($cliente->delete())
            return response()->json(["Message"=>"Cliente $cliente removido!"
            ,"Cliente"=>$cliente]);

        } catch (Exception $error) {
            return response()->json([
                'Erro' => "Erro ao excluir cliente",
                'Exception' => $error->getMessage()
            ], 404);
          }
    }

    public function clientes(Cliente $cliente){
        return response()->json($cliente->load('imovels'));
    }

    public function clientesContrato(Cliente $cliente){

        $clienteComContratoEImovel = $cliente->load('contratos.imovel');

        return response()->json([
            'clienteComContratoEImovel' => $clienteComContratoEImovel,
        ]);
    }
}
