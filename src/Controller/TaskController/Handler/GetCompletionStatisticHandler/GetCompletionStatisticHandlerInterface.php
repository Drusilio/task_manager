<?php

namespace App\Controller\TaskController\Handler\GetCompletionStatisticHandler;

use App\Controller\TaskController\Dto\GetCompletionStatisticDto;

interface GetCompletionStatisticHandlerInterface
{
    public function handle(GetCompletionStatisticDto $dto): array|float|int|string;
}