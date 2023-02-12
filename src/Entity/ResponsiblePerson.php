<?php

namespace App\Entity;

use App\Repository\ResponsiblePersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsiblePersonRepository::class)]
class ResponsiblePerson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'ResponsiblePerson', targetEntity: Task::class)]
    private Collection $tasks;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Task>
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addComment(Task $comment): self
    {
        if (!$this->tasks->contains($comment)) {
            $this->tasks->add($comment);
            $comment->setResponsiblePerson($this);
        }

        return $this;
    }

    public function removeComment(Task $comment): self
    {
        if ($this->tasks->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getResponsiblePerson() === $this) {
                $comment->setResponsiblePerson(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
