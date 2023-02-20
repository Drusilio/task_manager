<?php

namespace App\Controller\TaskController\Handler\EditTask;

use App\Controller\TaskController\Dto\EditTaskDto;
use App\Entity\Task;
use Symfony\Component\Uid\Uuid;

interface EditTaskHandlerInterface
{
    public function handle(EditTaskDto $dto): Uuid;
}