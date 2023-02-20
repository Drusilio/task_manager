<?php

namespace App\Controller\TaskController\Dto;

use DateTimeInterface;
use Symfony\Component\Uid\Uuid;

class EditTaskDto
{
    private ?string $description;

    private ?\DateTimeInterface $deadline;

    private ?bool $status;

    private ?string $file;

    private ?\DateTimeInterface $completionDate;

    private Uuid $responsiblePersonUuid;

    private Uuid $taskUuid;

    /**
     * @param string|null $description
     * @param DateTimeInterface|null $deadline
     * @param bool|null $status
     * @param string|null $file
     * @param DateTimeInterface|null $completionDate
     * @param Uuid $responsiblePersonUuid
     * @param Uuid $taskUuid
     */
    public function __construct(?string $description, ?DateTimeInterface $deadline, ?bool $status, ?string $file, ?DateTimeInterface $completionDate, Uuid $responsiblePersonUuid, Uuid $taskUuid)
    {
        $this->description = $description;
        $this->deadline = $deadline;
        $this->status = $status;
        $this->file = $file;
        $this->completionDate = $completionDate;
        $this->responsiblePersonUuid = $responsiblePersonUuid;
        $this->taskUuid = $taskUuid;
    }


    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDeadline(): ?DateTimeInterface
    {
        return $this->deadline;
    }

    /**
     * @param DateTimeInterface|null $deadline
     */
    public function setDeadline(?DateTimeInterface $deadline): void
    {
        $this->deadline = $deadline;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     */
    public function setStatus(?bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     */
    public function setFile(?string $file): void
    {
        $this->file = $file;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCompletionDate(): ?DateTimeInterface
    {
        return $this->completionDate;
    }

    /**
     * @param DateTimeInterface|null $completionDate
     */
    public function setCompletionDate(?DateTimeInterface $completionDate): void
    {
        $this->completionDate = $completionDate;
    }

    /**
     * @return Uuid
     */
    public function getResponsiblePersonUuid(): Uuid
    {
        return $this->responsiblePersonUuid;
    }

    /**
     * @param Uuid $responsiblePersonUuid
     */
    public function setResponsiblePersonUuid(Uuid $responsiblePersonUuid): void
    {
        $this->responsiblePersonUuid = $responsiblePersonUuid;
    }

    /**
     * @return Uuid
     */
    public function getTaskUuid(): Uuid
    {
        return $this->taskUuid;
    }

    /**
     * @param Uuid $taskUuid
     */
    public function setTaskUuid(Uuid $taskUuid): void
    {
        $this->taskUuid = $taskUuid;
    }




}