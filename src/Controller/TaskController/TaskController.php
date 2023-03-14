<?php

namespace App\Controller\TaskController;


use App\ArgumentResolver\AttributeArgument;
use App\Controller\TaskController\Dto\CreateTaskDto;
use App\Controller\TaskController\Dto\DeleteTaskDto;
use App\Controller\TaskController\Dto\EditTaskDto;
use App\Controller\TaskController\Dto\GetCompletionStatisticDto;
use App\Controller\TaskController\Dto\GetTaskOnDateDto;
use App\Controller\TaskController\Handler\CreateTask\CreateTaskHandlerInterface;
use App\Controller\TaskController\Handler\DeleteTask\DeleteTaskHandlerInterface;
use App\Controller\TaskController\Handler\EditTask\EditTaskHandlerInterface;
use App\Controller\TaskController\Handler\GetCompletionStatisticHandler\GetCompletionStatisticHandlerInterface;
use App\Controller\TaskController\Handler\GetTaskOnDate\GetTaskOnDateHandler;
use App\Controller\TaskController\Handler\GetTaskOnDate\GetTaskOnDateHandlerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/task')]
class TaskController extends AbstractController
{
    #[Route('/create', methods: [Request::METHOD_POST])]
    public function createTask(#[AttributeArgument] CreateTaskDto $createTaskDto, CreateTaskHandlerInterface $createTaskHandler): \Symfony\Component\Uid\Uuid
    {
        return $createTaskHandler->handle($createTaskDto);
    }

    #[Route('/edit', methods: [Request::METHOD_PUT])]
    public function editTask(#[AttributeArgument] EditTaskDto $dto, EditTaskHandlerInterface $editTaskHandler): \Symfony\Component\Uid\Uuid
    {
        return $editTaskHandler->handle($dto);
    }

    #[Route('/delete', methods: [Request::METHOD_DELETE])]
    public function deleteTask(#[AttributeArgument]DeleteTaskDto $dto, DeleteTaskHandlerInterface $deleteTaskHandler)
    {
        $deleteTaskHandler->handle($dto);
    }

    #[Route('/get-task-by-date', methods: [Request::METHOD_GET])]
    public function getTaskOnDate(#[AttributeArgument] GetTaskOnDateDto $getTaskOnDateDto, GetTaskOnDateHandlerInterface $dateHandler): float|array|int|string
    {
        return $dateHandler->handle($getTaskOnDateDto);
    }

    #[Route('/get-completion-statistic', methods: [Request::METHOD_GET])]
    public function getCompletionStatistic(#[AttributeArgument] GetCompletionStatisticDto $completionStatisticDto, GetCompletionStatisticHandlerInterface $statisticHandler): float|array|int|string
    {

        return $statisticHandler->handle($completionStatisticDto);
    }
}