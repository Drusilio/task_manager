<?php

namespace App\Entity;

use App\Controller\TaskController\Dto\ResponsiblePersonDto;
use App\Repository\ResponsiblePersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

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

    #[ORM\Column(type: 'uuid', unique: true)]
    private Uuid $uuid;

    /**
     * @param string|null $name
     */
    public function __construct(?string $name)
    {
        $this->name = $name;
        $this->uuid = Uuid::v6();
        $this->tasks = new ArrayCollection();
    }


    public static function createFromDto(ResponsiblePersonDto $responsiblePersonDto): ResponsiblePerson
    {
        $responsiblePerson = new self();

        $responsiblePerson->name = $responsiblePersonDto->getName();

        return $responsiblePerson;
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

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    /**
     * @param Uuid $uuid
     */
    public function setUuid(Uuid $uuid): void
    {
        $this->uuid = $uuid;
    }


}
