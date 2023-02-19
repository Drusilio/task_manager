<?php

namespace App\Controller\TaskController\Handler\CreateTask;

use App\Controller\TaskController\Dto\CreateTaskDto;
use Symfony\Component\Uid\Uuid;

interface CreateTaskHandlerInterface
{
    public function handle(CreateTaskDto $createTaskDto): Uuid;
}