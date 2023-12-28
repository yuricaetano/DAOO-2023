<?php

namespace Daoo\Aula03\controller\api;

use Daoo\Aula03\model\Cliente as ClienteModel;
use Daoo\Aula03\model\iDAO;
use Exception;

class Cliente extends Controller
{

	private ClienteModel $model;

	public function __construct()
	{
		try {
			$this->model = new ClienteModel();
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
		$cliente = $this->model->read($id);
		if ($cliente) {
			$response = ['cliente' => $cliente];
		} else {
			$response = ['Erro' => "Cliente não encontrado"];
			header('HTTP/1.0 404 Not Found');
		}
		echo json_encode($response);
	}

	public function save()
	{
		try {
			$this->validadeClienteRequest();

			$this->model = new ClienteModel(
				$_POST['nome'],
				$_POST['email'],
				$_POST['senha']
			);


			if ($this->model->create()) {
				echo json_encode([
					"success" => "Cliente registrado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			} else {
				$msg = 'Erro ao cadastrar Cliente!';
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
				throw new Exception("Informe o ID do Cliente!!");

			$this->validadeClienteRequest();

			$this->model = new ClienteModel(
				$_POST['nome'],
				$_POST['email'],
				$_POST['senha']
			);
			$this->model->id = $_POST["id"];

			if (isset($_POST['status']))
				$this->model->status = $_POST['status'];
			$this->model->dataAtualizacao = date('Y-m-d H:i:s');

			if ($this->model->update())
				echo json_encode([
					"success" => "Cliente atualizado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			else throw new \Exception("Erro ao atualizar Cliente!");
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
				$response = ["message:" => "Cliente id:$id removido com sucesso!"];
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

	private function validadeClienteRequest()
	{
		$fields = [
			'nome',
			'email',
			'senha'
		];
		if (!$this->validatePostRequest($fields))
			throw new \Exception('Erro: campos imcompletos!');
	}
}
