<?php

namespace App\Controller\TaskController\Dto;

class GetCompletionStatisticDto
{
    private ?string $dateFrom = null;
    private ?string $dateTo = null;

    /**
     * @return string|null
     */
    public function getDateFrom(): ?string
    {
        return $this->dateFrom;
    }

    /**
     * @param string|null $dateFrom
     */
    public function setDateFrom(?string $dateFrom): void
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @return string|null
     */
    public function getDateTo(): ?string
    {
        return $this->dateTo;
    }

    /**
     * @param string|null $dateTo
     */
    public function setDateTo(?string $dateTo): void
    {
        $this->dateTo = $dateTo;
    }


}