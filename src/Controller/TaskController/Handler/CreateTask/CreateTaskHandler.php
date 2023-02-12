<?php

namespace App\Controller\TaskController\Handler\CreateTask;

use App\Controller\TaskController\Dto\CreateTaskDto;
use App\Entity\Task;
use App\Repository\TaskRepository;

class CreateTaskHandler implements CreateTaskHandlerInterface
{
    public function __construct(private readonly TaskRepository $repository)
    {

    }

    public function handle(CreateTaskDto $createTaskDto): ?int
    {
        $task =Task::createFromDto($createTaskDto);
        $this->repository->save($task, true);

        return $task->getId();
    }
}