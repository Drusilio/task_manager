<?php

namespace App\Entity;

use App\Repository\SubtaskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubtaskRepository::class)]
class Subtask
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255, nullable: true)]
    private string $text;

    #[ORM\Column]
    private bool $checkbox;

    #[ORM\Column]
    private int $indexNumber;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return bool
     */
    public function isCheckbox(): bool
    {
        return $this->checkbox;
    }

    /**
     * @param bool $checkbox
     */
    public function setCheckbox(bool $checkbox): void
    {
        $this->checkbox = $checkbox;
    }

    /**
     * @return int
     */
    public function getIndexNumber(): int
    {
        return $this->indexNumber;
    }

    /**
     * @param int $indexNumber
     */
    public function setIndexNumber(int $indexNumber): void
    {
        $this->indexNumber = $indexNumber;
    }


}
