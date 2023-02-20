<?php

namespace App\Controller\ResponsiblePersonController\Hendler\CreateResponsiblePerson;

use App\Controller\ResponsiblePersonController\Dto\CreateResponsiblePersonDto;

interface CreateResponsiblePersonHandlerInterface
{
    public function handle(CreateResponsiblePersonDto $createResponsiblePersonDto): \Symfony\Component\Uid\Uuid;
}