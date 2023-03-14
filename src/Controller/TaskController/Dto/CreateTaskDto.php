<?php

namespace App\Controller\TaskController\Dto;

use DateTimeInterface;
use Symfony\Component\Uid\Uuid;

class CreateTaskDto
{
    private ?string $description;

    private ?\DateTimeInterface $deadline;

    private ?bool $isComplited;

    private ?string $file;

    private ?\DateTimeInterface $completionDate;

    private ?Uuid $responsiblePersonUuid;

    public function __construct(?string            $description,
                                ?DateTimeInterface $deadline,
                                ?bool              $isComplited,
                                ?string            $file,
                                ?DateTimeInterface $completionDate,
                                Uuid               $responsiblePersonUuid)
    {
        $this->description = $description;
        $this->deadline = $deadline;
        $this->isComplited = $isComplited;
        $this->file = $file;
        $this->completionDate = $completionDate;
        $this->responsiblePersonUuid = $responsiblePersonUuid;
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
    public function getIsComplited(): ?bool
    {
        return $this->isComplited;
    }

    /**
     * @param bool|null $isComplited
     */
    public function setIsComplited(?bool $isComplited): void
    {
        $this->isComplited = $isComplited;
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

}