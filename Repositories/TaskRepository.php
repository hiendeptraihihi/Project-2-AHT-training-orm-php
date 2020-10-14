<?php

namespace Zino\Repositories;

use Zino\Resources\TaskResourceModel;
use Zino\Models\Task;

class TaskRepository
{
    public function add($model)
    {
        $taskResource = new TaskResourceModel();
        $taskResource->save($model);
    }

    public function edit()
    {

    }

    public function delete()
    {
        
    }

    public function get()
    {
        
    }

    public function getAll()
    {
        $taskResource = new TaskResourceModel();
        return $taskResource->getAllRecord();
    }
}