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
    public function save($model)
    {
        $frontLine = "(";
        $bacLine = " VALUES (";
        $arr = get_object_vars($model);
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

    public function getAllRecord()
    {
        $query = "SELECT * FROM ". $this->tablename;
        $req = Database::getBdd()->query($query);
        return $req->fetchAll();
    }
}
