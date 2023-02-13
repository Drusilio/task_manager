<?php

namespace App\Controller\TaskController\Handler\DeleteTask;

use App\Entity\Task;
use App\Repository\TaskRepository;

class DeleteTaskHandler implements DeleteTaskHandlerInterface
{
    public function __construct(private readonly TaskRepository $taskRepository) {

    }
    public function handle(Task $task){
        $this->taskRepository->remove($task, true);
    }
}