<?php

namespace Daoo\Aula03\controller\api;

use Daoo\Aula03\model\Contrato as ContratoModel;
use Daoo\Aula03\model\iDAO;
use Exception;

class Contrato extends Controller
{

	private ContratoModel $model;

	public function __construct()
	{
		try {
			$this->model = new ContratoModel();
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
		$contrato = $this->model->read($id);
		if ($contrato) {
			$response = ['contrato' => $contrato];
		} else {
			$response = ['Erro' => "Contrato não encontrado"];
			header('HTTP/1.0 404 Not Found');
		}
		echo json_encode($response);
	}

	public function save()
	{
		try {
			$this->validadeContratoRequest();

			$this->model = new ContratoModel(
				$_POST['tipo'],
				$_POST['descricao'],
				$_POST['valor']
			);
			if ($this->model->create()) {
				echo json_encode([
					"success" => "Contrato registrado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			} else {
				$msg = 'Erro ao cadastrar Contrato!';
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
				throw new Exception("Informe o ID do Contrato!!");

			$this->validadeContratoRequest();

			$this->model = new ContratoModel(
				$_POST['tipo'],
				$_POST['descricao'],
				$_POST['valor']
			);
			$this->model->id = $_POST["id"];

			if ($this->model->update())
				echo json_encode([
					"success" => "Contrato atualizado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			else throw new \Exception("Erro ao atualizar contrato!");
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
				$response = ["message:" => "Contrato id:$id removido com sucesso!"];
			} else {
				$this->setHeader(500, 'Internal Error.');
				throw new Exception("Erro ao remover Contrato!");
			}
			echo json_encode($response);
		} catch (\Exception $error) {
			echo json_encode([
				"error" => $error->getMessage()
			]);
		}
	}

	private function validadeContratoRequest()
	{
		$fields = [
			'tipo',
			'descricao',
			'valor'
		];
		if (!$this->validatePostRequest($fields))
			throw new \Exception('Erro: campos imcompletos!');
	}
}
