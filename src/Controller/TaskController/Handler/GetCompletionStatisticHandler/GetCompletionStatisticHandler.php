<?php

namespace App\Controller\TaskController\Handler\GetCompletionStatisticHandler;

use App\Controller\TaskController\Dto\GetCompletionStatisticDto;
use App\Repository\TaskRepository;

class GetCompletionStatisticHandler implements GetCompletionStatisticHandlerInterface
{
    public function __construct(private readonly TaskRepository $taskRepository) {

    }

    public function handle(GetCompletionStatisticDto $dto): array|float|int|string
    {
        $dateFrom = new \DateTime($dto->getDateFrom());
        $dateTo = new \DateTime($dto->getDateTo());

        return $this->taskRepository->getCompletionStatistic($dateFrom, $dateTo);
    }
}