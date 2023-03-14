<?php

namespace App\Entity;

use App\Controller\TaskController\Dto\EditTaskDto;
use App\Repository\TaskRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'uuid', unique: true)]
    private Uuid $uuid;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $deadline = null;

    #[ORM\Column]
    private ?bool $isComplited = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $file = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $completionDate = null;

    #[ORM\ManyToOne(cascade: ['persist'], inversedBy: 'comments')]
    private ?ResponsiblePerson $responsiblePerson = null;

    #[ORM\OneToMany(mappedBy: 'task', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    public function __construct(?string $description, ?\DateTimeInterface $deadline, ?bool $isComplited, ?string $file, ?\DateTimeInterface $completionDate, ?ResponsiblePerson $responsiblePerson)
    {
        $this->uuid = Uuid::v6();
        $this->description = $description;
        $this->deadline = $deadline;
        $this->isComplited = $isComplited;
        $this->file = $file;
        $this->completionDate = $completionDate;
        $this->responsiblePerson = $responsiblePerson;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function setComments(Collection $comments): void
    {
        $this->comments = $comments;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getCompletionDate(): ?\DateTimeInterface
    {
        return $this->completionDate;
    }

    public function setCompletionDate(?\DateTimeInterface $completionDate): self
    {
        $this->completionDate = $completionDate;

        return $this;
    }

    public function getResponsiblePerson(): ?ResponsiblePerson
    {
        return $this->responsiblePerson;
    }

    public function setResponsiblePerson(?ResponsiblePerson $responsiblePerson): self
    {
        $this->responsiblePerson = $responsiblePerson;
        return $this;
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setTask($this);
        }
        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTask() === $this) {
                $comment->setTask(null);
            }
        }
        return $this;
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


}
