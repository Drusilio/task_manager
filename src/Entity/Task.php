<?php

namespace App\Entity;

use App\Controller\TaskController\Dto\AbstractTaskDto;
use App\Controller\TaskController\Dto\CreateTaskDto;
use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $deadline = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $file = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $completionDate = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?ResponsiblePerson $responsiblePerson = null;

    #[ORM\OneToMany(mappedBy: 'task', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public static function createFromDto(AbstractTaskDto $taskDto): Task
    {
        $task = new self();

        $task->description = $taskDto->getDescription();
        $task->deadline = $taskDto->getDeadline();
        $task->status = $taskDto->isStatus();
        $task->file = $taskDto->getFile();
        $task->completionDate = $taskDto->getCompletionDate();
        $task->responsiblePerson = ResponsiblePerson::createFromDto($taskDto->getResponsiblePersonDto());

        return $task;
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

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

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

    /**
     * @return Collection<int, Comment>
     */
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
}
