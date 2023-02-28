<?php

namespace App\Controller\TaskController\Dto;

class GetTaskOnDateDto
{
    private ?string $dateFrom = null;
    private ?string $dateTo = null;


    public function getDateFrom(): ?string
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?string $dateFrom): void
    {
        $this->dateFrom = $dateFrom;
    }

    public function getDateTo(): ?string
    {
        return $this->dateTo;
    }

    public function setDateTo(?string $dateTo): void
    {
        $this->dateTo = $dateTo;
    }
}