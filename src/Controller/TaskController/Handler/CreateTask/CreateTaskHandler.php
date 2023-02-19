<?php

namespace App\Controller\TaskController\Handler\CreateTask;

use App\Controller\TaskController\Dto\CreateTaskDto;
use App\Entity\Task;
use App\Repository\ResponsiblePersonRepository;
use App\Repository\TaskRepository;
use Exception;
use Symfony\Component\Uid\Uuid;

class CreateTaskHandler implements CreateTaskHandlerInterface
{
    public function __construct(private readonly TaskRepository $taskRepository, private readonly ResponsiblePersonRepository $personRepository)
    {
    }

    public function handle(CreateTaskDto $createTaskDto): Uuid
    {
        $person = $this->personRepository->findOneBy(['uuid' => $createTaskDto->getResponsiblePersonUuid()]);
        if ($person == null) {
            throw new Exception('Responsible person не найден');
        }

        $task = new Task(
            $createTaskDto->getDescription(),
            $createTaskDto->getDeadline(),
            $createTaskDto->getStatus(),
            $createTaskDto->getFile(),
            $createTaskDto->getCompletionDate(),
            $person
        );
        $this->taskRepository->save($task, true);

        return $task->getUuid();
    }
}