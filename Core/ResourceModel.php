<?php

namespace Zino\Core;

use Zino\Interfaces\ResourceModelInterface;
use Zino\Config\Database;

class ResourceModel implements ResourceModelInterface
{
    private $tablename;
    private $id;
    private $model; //lu ten Model

    public function _init($tablename, $id, $model)
    {
        $this->tablename = $tablename;
        $this->id = $id;
        $this->model = $model;
    }
    public function save($model, $id=null)
    {
        $arr = get_object_vars($model);
        unset($arr[$this->id]);
        if ($id) {
            $queryBody = "";
            foreach ($arr as $key => $rows)
            {
                $queryBody = $queryBody. $key. " = :". $key. ", ";
            }
            $queryBody = rtrim($queryBody, ", ");
            $query = "UPDATE ". $this->tablename. " SET ". $queryBody. " WHERE ". $this->id. " = ". $id;
            $req = Database::getBdd()->prepare($query);
            return $req->execute($arr);
        } else {
            $frontLine = "(";
            $bacLine = " VALUES (";
            foreach ($arr as $key => $value)
            {
                if ($key != $this->id)
                {
                    if ($value != null)
                    {
                        $frontLine = $frontLine . $key. ", ";
                        $bacLine = $bacLine . ":". $key. ", ";
                    } else {
                        $frontLine = $frontLine . $key. ", ";
                        $bacLine = $bacLine . "null". ", ";
                    }
                }
            }
            unset($arr[$this->id]);
            $frontLine = rtrim($frontLine, ", ");
            $bacLine = rtrim($bacLine, ', ');
            $frontLine = $frontLine . ")";
            $bacLine = $bacLine. ")";
            $query = "INSERT INTO ". $this->tablename. " ". $frontLine . $bacLine;
            $req = Database::getBdd()->prepare($query);
            return $req->execute($arr);
        }
    }

    public function getAllRecord()
    {
        $query = "SELECT * FROM ". $this->tablename;
        $req = Database::getBdd()->query($query);
        return $req->fetchAll();
    }

    public function getOne($id)
    {
        $query = "SELECT * FROM ". $this->tablename. " WHERE ". $this->id. " = :". $this->id;
        $req = Database::getBdd()->prepare($query);
        $req->execute([$this->id => $id]);
        return $req->fetch();
    }

    public function remove($id)
    {
        $query = "DELETE FROM ". $this->tablename. " WHERE ". $this->id. " = ". " :".$this->id;
        $req = Database::getBdd()->prepare($query);
        return $req->execute([$this->id => $id]);
    }
}
