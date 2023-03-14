<?php

namespace App\Controller\TaskController\Handler\GetTaskOnDate;

use App\Controller\TaskController\Dto\GetTaskOnDateDto;
use App\Repository\TaskRepository;

class GetTaskOnDateHandler implements GetTaskOnDateHandlerInterface
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }
    public function handle(GetTaskOnDateDto $getTaskOnDateDto): array
    {
        $dateFrom = new \DateTime($getTaskOnDateDto->getDateFrom());
        $dateTo = new \DateTime($getTaskOnDateDto->getDateTo());
        return $this->taskRepository->findByDateDiapason($dateFrom, $dateTo);
    }
}