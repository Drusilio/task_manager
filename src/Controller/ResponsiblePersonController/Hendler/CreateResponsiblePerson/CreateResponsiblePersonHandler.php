<?php

namespace App\Controller\ResponsiblePersonController\Hendler\CreateResponsiblePerson;

use App\Controller\ResponsiblePersonController\Dto\CreateResponsiblePersonDto;
use App\Entity\ResponsiblePerson;
use App\Repository\ResponsiblePersonRepository;

class CreateResponsiblePersonHandler implements CreateResponsiblePersonHandlerInterface
{
    public function __construct(private readonly ResponsiblePersonRepository $responsiblePersonRepository)
    {
    }

    public function handle(CreateResponsiblePersonDto $createResponsiblePersonDto): \Symfony\Component\Uid\Uuid
    {
        $person = new ResponsiblePerson($createResponsiblePersonDto->getName());
        $this->responsiblePersonRepository->save($person, true);
        return $person->getUuid();
    }

}