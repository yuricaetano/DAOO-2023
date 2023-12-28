<?php

namespace Daoo\Aula03\model;

use Exception;

class Imovel extends Model implements iDAO
{
    private $id, $cliente, $rua,
        $numero, $descricao;

    public function __construct(
        $cliente = null,
        $rua = '',
        $numero = '',
        $descricao = ''
    ) {
        try {
            parent::__construct();
        } catch (Exception $error) {
            throw $error;
        }

        $this->table = 'imovels';
        $this->primary = 'id';
        $this->cliente = $cliente;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->descricao = $descricao;
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

    public function readJoin($id = null)
    {
        try {
            if (!isset($id)) {
                throw new Exception("Campo ID de cliente Não preenchido!!");
            }
            $sql = "SELECT imovels.* from imovels join clientes on (clientes.id = imovels.clientes_id) where imovels.cliente_id = :id;";

            $prepStmt = $this->conn->prepare($sql);
            $prepStmt->bindValue(':id', $id);

            if (!$prepStmt->execute())
                throw new Exception("Erro no select de join entre cliente e imovel!");

            $this->dumpQuery($prepStmt);
            return $prepStmt->fetchAll(self::FETCH);

            
        } catch (\Exception $e) {
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
                throw new Exception("Erro ao inserir imovel!!");

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
            "cliente_id" => $this->cliente,
            "rua" => $this->rua,
            "numero" => $this->numero,
            "descricao" => $this->descricao
        ];
        if ($this->id) $columns['id'] = $this->id;
        return $columns;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        if ($name != 'id') $this->mapColumns($this);
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
