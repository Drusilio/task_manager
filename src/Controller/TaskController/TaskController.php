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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/task')]
class TaskController extends AbstractController
{
    #[Route('/create', methods: [Request::METHOD_POST])]
    public function createTask(#[AttributeArgument] CreateTaskDto $createTaskDto, CreateTaskHandlerInterface $createTaskHandler): Response
    {
        $createTaskHandler->handle($createTaskDto);
        dump('Задание создано');
        return new Response();
    }

    #[Route('/edit/{uuid}', methods: [Request::METHOD_POST])]
    public function editTask(Task $task, #[AttributeArgument] EditTaskDto $dto, EditTaskHandlerInterface $editTaskHandler): Response
    {
        dump($task);
        $editTaskHandler->handle($task, $dto);
        dump('Внесены изменения в задание');
        return new Response();
    }

    #[Route('/delete/{uuid}', methods: [Request::METHOD_DELETE])]
    public function deleteTask(Task $task, DeleteTaskHandlerInterface $deleteTaskHandler): Response
    {
        dump($task->getUuid());
        dump($task);

        $deleteTaskHandler->handle($task);

        dump('Задание удалено');
        return new Response();
    }
}