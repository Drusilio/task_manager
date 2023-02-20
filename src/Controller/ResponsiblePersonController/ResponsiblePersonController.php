<?php

namespace App\Controller\ResponsiblePersonController;

use App\ArgumentResolver\AttributeArgument;
use App\Controller\ResponsiblePersonController\Dto\CreateResponsiblePersonDto;
use App\Controller\ResponsiblePersonController\Hendler\CreateResponsiblePerson\CreateResponsiblePersonHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/responsible-person')]
class ResponsiblePersonController extends AbstractController
{

    #[Route('/create', methods: [Request::METHOD_POST])]
    public function createResponsiblePerson(#[AttributeArgument]CreateResponsiblePersonDto $createResponsiblePersonDto, CreateResponsiblePersonHandlerInterface $personHandler): \Symfony\Component\Uid\Uuid
    {
        return $personHandler->handle($createResponsiblePersonDto);
    }

}