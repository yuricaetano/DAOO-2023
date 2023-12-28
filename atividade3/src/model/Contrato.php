<?php

namespace Daoo\Aula03\model;

use Exception;

class Contrato extends Model implements iDAO
{
    private $id, $tipo, $descricao,
        $valor;

    public function __construct(
        $tipo = '',
        $descricao = '',
        $valor = 0,
    ) {
        try {
            parent::__construct();
        } catch (Exception $error) {
            throw $error;
        }

        $this->table = 'contratos';
        $this->primary = 'id';
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->mapColumns($this);
    }

    public function read($id = null)
    {
        try {
            if (isset($id))
                return $this->selectById($id);

            return $this->select();
        } catch (\Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            throw new Exception($error->getMessage());
        }
    }

    public function create()
    {
        try {
            $sql = "INSERT INTO $this->table ($this->columns) "
                . "VALUES ($this->params)";
            $prepStmt = $this->conn->prepare($sql);
            $result = $prepStmt->execute($this->values);

            if (!$result || $prepStmt->rowCount() != 1)
                throw new Exception("Erro ao inserir contrato!!");

            $this->id = $this->conn->lastInsertId();
            $this->dumpQuery($prepStmt);
            return true;
        } catch (\Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            $prepStmt ?? $this->dumpQuery($prepStmt);
            return false;
        }
    }

    public function update()
    {
        try {
            $this->values[':id'] = $this->id;
            $sql = "UPDATE $this->table SET $this->updated
                  WHERE $this->primary = :id";
            $prepStmt = $this->conn->prepare($sql);

            if ($prepStmt->execute($this->values)) {
                $this->dumpQuery($prepStmt);
                return $prepStmt->rowCount() > 0;
            }
        } catch (\Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            $this->dumpQuery($prepStmt);
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $prepStmt = $this->conn->prepare($sql);
        if ($prepStmt->execute([':id' => $id]))
            return $prepStmt->rowCount() > 0;
        else return false;
    }

    public function filter($arrayFilter)
    {
        try {
            if (!sizeof($arrayFilter))
                throw new \Exception("Filtros vazios!");
            $this->setFilters($arrayFilter);
            $sql = "SELECT * FROM $this->table WHERE $this->filters";
            $prepStmt = $this->conn->prepare($sql);
            if (!$prepStmt->execute($this->values))
                return false;
            $this->dumpQuery($prepStmt);
            return $prepStmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            if (isset($prepStmt))
                $this->dumpQuery($prepStmt);
            throw new \Exception($error->getMessage());
        }
    }

    public function getColumns(): array
    {

        $columns = [
            "tipo" => $this->tipo,
            "descricao" => $this->descricao,
            "valor" => $this->valor,
          ];
        if ($this->id) $columns['id'] = $this->id;
        return $columns;
    }

    public function __set($tipo, $value)
    {
        $this->$tipo = $value;
        if ($tipo != 'id') $this->mapColumns($this);
    }

    public function __get($tipo)
    {
        return $this->$tipo;
    }

}
