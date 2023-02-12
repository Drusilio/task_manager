<?php

namespace App\Controller\TaskController\Handler\EditTask;

use App\ArgumentResolver\AttributeArgument;
use App\Controller\TaskController\Dto\EditTaskDto;
use App\Entity\ResponsiblePerson;
use App\Entity\Task;
use App\Repository\TaskRepository;

class EditTaskHandler implements EditTaskHandlerInterface
{
    public function __construct(private readonly TaskRepository $repository) {

    }
    public function handle(Task $task, EditTaskDto $dto): ?int
    {

        $task->setDeadline($dto->getDeadline());
        $task->setFile($dto->getFile());
        $task->setDescription($dto->getDescription());
        $task->setStatus($dto->isStatus());
        $task->setCompletionDate($dto->getCompletionDate());
        $task->setResponsiblePerson(ResponsiblePerson::createFromDto($dto->getResponsiblePersonDto()));

        $this->repository->save($task, true);

        return $task->getId();
    }
}