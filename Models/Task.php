<?php
namespace Zino\Models;

use Zino\Core\Model;
use Zino\Config\Database;

class Task extends Model
{
    public $id;
    public $title;
    public $description;
    public $created_at;
    public $updated_at;

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setId($arr)
    {
        $this->id = $arr;
    }
    public function setTitle($arr)
    {
        $this->title = $arr;
    }
    public function setDescription($arr)
    {
        $this->description = $arr;
    }
    public function setCreatedAt($arr)
    {
        $this->created_at = $arr;
    }
    public function setUpdatedAt($arr)
    {
        $this->updated_at = $arr;
    }
}

