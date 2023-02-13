<?php

namespace App\Controller\TaskController\Dto;

use DateTimeInterface;

class EditTaskDto
{
    private string $description;

    private DateTimeInterface $deadline;

    private bool $status;

    private string $file;

    private DateTimeInterface $completionDate;

    private ResponsiblePersonDto $responsiblePersonDto;

    /**
     * @param string $description
     * @param DateTimeInterface $deadline
     * @param bool $status
     * @param string $file
     * @param DateTimeInterface $completionDate
     * @param ResponsiblePersonDto $responsiblePerson
     */
    public function __construct(string $description, DateTimeInterface $deadline, bool $status, string $file, DateTimeInterface $completionDate, ResponsiblePersonDto $responsiblePerson)
    {
        $this->description = $description;
        $this->deadline = $deadline;
        $this->status = $status;
        $this->file = $file;
        $this->completionDate = $completionDate;
        $this->responsiblePersonDto = $responsiblePerson;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDeadline(): DateTimeInterface
    {
        return $this->deadline;
    }

    /**
     * @param DateTimeInterface $deadline
     */
    public function setDeadline(DateTimeInterface $deadline): void
    {
        $this->deadline = $deadline;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCompletionDate(): DateTimeInterface
    {
        return $this->completionDate;
    }

    /**
     * @param DateTimeInterface $completionDate
     */
    public function setCompletionDate(DateTimeInterface $completionDate): void
    {
        $this->completionDate = $completionDate;
    }

    /**
     * @return ResponsiblePersonDto
     */
    public function getResponsiblePersonDto(): ResponsiblePersonDto
    {
        return $this->responsiblePersonDto;
    }

    /**
     * @param ResponsiblePersonDto $responsiblePersonDto
     */
    public function setResponsiblePersonDto(ResponsiblePersonDto $responsiblePersonDto): void
    {
        $this->responsiblePersonDto = $responsiblePersonDto;
    }
}