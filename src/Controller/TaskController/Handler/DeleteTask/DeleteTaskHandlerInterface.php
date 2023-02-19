<?php

namespace App\Controller\TaskController\Handler\DeleteTask;

use App\Controller\TaskController\Dto\DeleteTaskDto;
use App\Entity\Task;

interface DeleteTaskHandlerInterface
{
    public function handle(DeleteTaskDto $taskDto);
}