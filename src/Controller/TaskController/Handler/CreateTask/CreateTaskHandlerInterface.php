<?php

namespace App\Controller\TaskController\Handler\CreateTask;

use App\Controller\TaskController\Dto\CreateTaskDto;

interface CreateTaskHandlerInterface
{
    public function handle(CreateTaskDto $createTaskDto): ?int;
}