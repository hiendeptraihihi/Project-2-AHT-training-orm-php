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

    public function modify($model, $id)
    {
        $taskResource = new TaskResourceModel();
        $taskResource->save($model, $id);
        return true;
    }

    public function delete($id)
    {
        $taskResource = new TaskResourceModel();
        $taskResource->remove($id);
    }

    public function get($id)
    {
        $taskResource = new TaskResourceModel();
        return $taskResource->getOne($id);
    }

    public function getAll()
    {
        $taskResource = new TaskResourceModel();
        return $taskResource->getAllRecord();
    }
}