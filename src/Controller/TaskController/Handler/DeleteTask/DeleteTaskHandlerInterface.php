<?php

namespace App\Controller\TaskController\Handler\DeleteTask;

use App\Entity\Task;

interface DeleteTaskHandlerInterface
{
    public function handle(Task $task);
}