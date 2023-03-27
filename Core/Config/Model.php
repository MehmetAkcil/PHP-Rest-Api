<?php

namespace Core\Config;

class Model extends Database
{

    public function findAll()
    {
        return $this->getRow("SELECT * FROM {$this->tableName}");
    }

    public function find(Int $ID)
    {
        return $this->getRow("SELECT * FROM {$this->tableName} WHERE {$this->primaryId} = ?", [
            $ID
        ]);
    }

    public function findWhere($where, $value)
    {
        return $this->getRow("SELECT * FROM {$this->tableName} WHERE {$where} = ?", [$value]);
    }

    public function insert(Array $data): false|string
    {
        return $this->insertTable($this->tableName, $data);
    }

    public function update(Int $id, Array $data)
    {
        return $this->updateTable($this->tableName, $data, $this->primaryId . ' = ?', $id);
    }

    public function updateWhere($where, $id, Array $data)
    {
        return $this->updateTable($this->tableName, $data, "{$where} ?", $id);
    }

}