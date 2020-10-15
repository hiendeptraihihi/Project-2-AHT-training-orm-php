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
    public function __construct()
    {
        if (property_exists($this, 'created_at')) $this->created_at = date('Y-m-d H:i:s');
        if (property_exists($this, 'ccc')) $this->ccc = "haha";
    }
}

