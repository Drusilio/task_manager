<?php

namespace App\Controller\TaskController\Handler\EditTask;

use App\Controller\TaskController\Dto\EditTaskDto;
use App\Entity\Task;

interface EditTaskHandlerInterface
{
    public function handle(Task $task, EditTaskDto $dto): ?int;
}