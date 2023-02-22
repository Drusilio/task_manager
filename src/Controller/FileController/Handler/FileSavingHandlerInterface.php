<?php

namespace App\Controller\FileController\Handler;

use App\Controller\FileController\Dto\FileSavingDto;
use Symfony\Component\Uid\Uuid;

interface FileSavingHandlerInterface
{
    public function handle(FileSavingDto $dto): Uuid;
}