<?php

namespace App\Controller\TaskController;


use App\ArgumentResolver\AttributeArgument;
use App\Controller\TaskController\Dto\CreateTaskDto;
use App\Controller\TaskController\Dto\EditTaskDto;
use App\Controller\TaskController\Handler\CreateTask\CreateTaskHandlerInterface;
use App\Controller\TaskController\Handler\DeleteTask\DeleteTaskHandlerInterface;
use App\Controller\TaskController\Handler\EditTask\EditTaskHandlerInterface;
use App\Entity\Task;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/task')]
class TaskController extends AbstractController
{
    #[Route('/create', methods: [Request::METHOD_POST])]
    public function createTask(#[AttributeArgument] CreateTaskDto $createTaskDto, CreateTaskHandlerInterface $createTaskHandler): ?int
    {
        dump('Задание создано');
        return $createTaskHandler->handle($createTaskDto);
    }

    #[Route('/edit/{id}', methods: [Request::METHOD_POST])]
    public function editTask(Task $task, #[AttributeArgument] EditTaskDto $dto, EditTaskHandlerInterface $editTaskHandler): ?int
    {
        dump('Внесены изменения в задание');
        return $editTaskHandler->handle($task, $dto);
    }

    #[NoReturn] #[Route('/delete/{id}', methods: [Request::METHOD_DELETE])]
    public function deleteTask(Task $task, DeleteTaskHandlerInterface $deleteTaskHandler) {
        $deleteTaskHandler->handle($task);
        dump('Задание удалено');
    }
}