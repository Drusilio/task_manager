<?php

namespace App\Controller\TaskController\Handler\GetTaskOnDate;

use App\Controller\TaskController\Dto\GetTaskOnDateDto;

interface GetTaskOnDateHandlerInterface
{
    public function handle(GetTaskOnDateDto $getTaskOnDateDto): float|array|int|string;
}