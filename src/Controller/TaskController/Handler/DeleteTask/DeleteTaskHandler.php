<?php

namespace App\Controller\TaskController\Handler\DeleteTask;

use App\Controller\TaskController\Dto\DeleteTaskDto;
use App\Entity\Task;
use App\Repository\TaskRepository;

class DeleteTaskHandler implements DeleteTaskHandlerInterface
{
    public function __construct(private readonly TaskRepository $taskRepository) {

    }
    public function handle(DeleteTaskDto $dto){
        $this->taskRepository->removeByUuid($dto->getTaskUuid(), true);
    }
}