<?php

namespace Zino\Controllers;

use Zino\Core\Controller;
use Zino\Core\ResourceModel;
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

            $task->title = $_POST['title'];
            $task->description = $_POST['description'];

            $taskRepo->add($task);
            header("Location: " . WEBROOT . "tasks/index");
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task= new Task();
        $taskRepo = new TaskRepository();

        $d["task"] = $taskRepo->get($id);
        $task = $taskRepo->get($id);

        if (isset($_POST["title"]))
        {
            $task->title = $_POST['title'];
            $task->description = $_POST['description'];

            if ($taskRepo->modify($task, $id))
            {
                header("location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $taskRepo = new TaskRepository();
        $taskRepo->delete($id);
        header("location: " . WEBROOT . "tasks/index");
    }
}
?>