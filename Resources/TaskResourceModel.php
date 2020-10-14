<?php

namespace Zino\Resources;

use Zino\Core\ResourceModel;
use Zino\Models\Task;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init('tasks', 'id', 'Task');
    }
}
