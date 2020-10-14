<?php

namespace Zino\Controllers;

use Zino\Core\Controller;
use Zino\Repositories\TaskRepository;
use Zino\Models\Task;

class tasksController extends Controller
{
    function index()
    {
        $task = new Task();
        $taskRepo = new TaskRepository();
        $d['tasks'] = $taskRepo->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $task= new Task();
            $taskRepo = new TaskRepository();

            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);
            $task->setCreatedAt(date('Y-m-d H:i:s'));
            $task->setUpdatedAt(date('Y-m-d H:i:s'));

            $taskRepo->add($task);
            header("Location: " . WEBROOT . "tasks/index");
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        // require(ROOT . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>