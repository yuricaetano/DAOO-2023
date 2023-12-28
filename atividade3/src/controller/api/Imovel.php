<?php

namespace Daoo\Aula03\controller\api;

use Daoo\Aula03\model\Imovel as ImovelModel;
use Daoo\Aula03\model\iDAO;
use Exception;
use PhpParser\Node\Stmt\Echo_;

class Imovel extends Controller
{

    private ImovelModel $model;

    public function __construct()
    {
        try {
            $this->model = new ImovelModel();
        } catch (Exception $error) {
            $this->setHeader(500, "Erro ao conectar ao banco!");
            json_encode(["error" => $error->getMessage()]);
        }
    }

    public function index()
    {
        echo json_encode($this->model->read());
    }

    public function show($id)
    {
        $imovel = $this->model->read($id);
        if ($imovel) {
            $response = ['Imovel' => $imovel];
        } else {
            $response = ['Erro' => "Imovel não encontrado"];
            header('HTTP/1.0 404 Not Found');
        }
        echo json_encode($response);
    }

    public function showByUser($cliente)
    {

        $imovel = $this->model->readJoin($cliente);
        if ($imovel) {
            $response = ['Imovel' => $imovel];
        } else {
            $response = ['erro' => "cliente nao foi encontrado"];
            header('HTTP/1.0 404 NOT FOUND');
        }
        echo json_encode(($response));
    }

    public function save()
    {
        try {
            $this->validadeImovelRequest();

            $this->model = new ImovelModel(
                $_POST['cliente'],
                $_POST['rua'],
                $_POST['numero'],
                $_POST['descricao']
            );

            if ($this->model->create()) {
                echo json_encode([
                    "success" => "Imovel registrado com sucesso!",
                    "data" => $this->model->getColumns()
                ]);
            } else {
                $msg = 'Erro ao cadastrar Imovel!';
                $this->setHeader(500, $msg);
                throw new \Exception($msg);
            }
        } catch (\Exception $error) {
            echo json_encode([
                "error" => $error->getMessage(),
                "trace" => $error->getTrace()
            ]);
        }
    }

    public function update()
    {
        try {
            if (!$this->validatePostRequest(['id']))
                throw new Exception("Informe o ID do Imovel!!");

            $this->validadeImovelRequest();

            $this->model = new ImovelModel(
                $_POST['cliente'],
                $_POST['rua'],
                $_POST['numero'],
                $_POST['descricao']
            );
            $this->model->id = $_POST["id"];

            if ($this->model->update())
                echo json_encode([
                    "success" => "Imovel atualizado com sucesso!",
                    "data" => $this->model->getColumns()
                ]);
            else throw new \Exception("Erro ao atualizar imovel!");
        } catch (\Exception $error) {
            $this->setHeader(500, 'Erro interno do servidor!!!!');
            echo json_encode([
                "error" => $error->getMessage()
            ]);
        }
    }

    public function hardRemove()
    {
        try {
            if (!isset($_POST["id"])) {
                $this->setHeader(400, 'Bad Request.');
                throw new \Exception('Erro: id obrigatorio!');
            }
            $id = $_POST["id"];
            if ($this->model->delete($id)) {
                $response = ["message:" => "Imovel id:$id removido com sucesso!"];
            } else {
                $this->setHeader(500, 'Internal Error.');
                throw new Exception("Erro ao remover Imovel!");
            }
            echo json_encode($response);
        } catch (\Exception $error) {
            echo json_encode([
                "error" => $error->getMessage()
            ]);
        }
    }

    private function validadeImovelRequest()
    {
        $fields = [
            'cliente',
            'rua',
            'numero',
            'descricao'
        ];
        if (!$this->validatePostRequest($fields))
            throw new \Exception('Erro: campos imcompletos!');
    }
}
