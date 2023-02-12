<?php

namespace App\Controller\TaskController\Dto;

class ResponsiblePersonDto
{
    private string $name;

    /**
     * @param string|null $name
     */
    public function __construct(?string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }



}