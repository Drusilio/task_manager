<?php

namespace App\Controller\TaskController\Handler\EditTask;

use App\Controller\TaskController\Dto\EditTaskDto;
use App\Entity\ResponsiblePerson;
use App\Entity\Task;
use App\Repository\ResponsiblePersonRepository;
use App\Repository\TaskRepository;
use Exception;
use Symfony\Component\Uid\Uuid;

class EditTaskHandler implements EditTaskHandlerInterface
{
    public function __construct(private readonly TaskRepository $taskRepository, private readonly ResponsiblePersonRepository $personRepository) {

    }
    public function handle(EditTaskDto $dto): Uuid
    {
        $person = $this->personRepository->findOneBy(['uuid' => $dto->getResponsiblePersonUuid()]);
        if ($person == null) {
            throw new Exception('Responsible person not found');
        }
        $task = $this->taskRepository->findBy(['uuid' => $dto->getTaskUuid()]);
        $task[0]->setDescription($dto->getDescription());
        $task[0]->setDeadline($dto->getDeadline());
        $task[0]->setStatus($dto->getStatus());
        $task[0]->setFile($dto->getFile());
        $task[0]->setCompletionDate($dto->getCompletionDate());
        $task[0]->setResponsiblePerson($person);

        $this->taskRepository->save($task[0], true);
        return $task[0]->getUuid();
    }
}