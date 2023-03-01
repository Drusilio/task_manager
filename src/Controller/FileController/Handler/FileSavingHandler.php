<?php

namespace App\Controller\FileController\Handler;

use App\Controller\FileController\Dto\FileSavingDto;
use App\Entity\File;
use App\Repository\FileRepository;
use Symfony\Component\Uid\Uuid;

class FileSavingHandler implements FileSavingHandlerInterface
{
    public function __construct(private readonly FileRepository $fileRepository){}
    public function handle(FileSavingDto $dto): Uuid
    {
        $file = $this->createFromDto($dto);
        $this->fileRepository->save($file, true);

        return $file->getUuid();
    }

    public function createFromDto(FileSavingDto $fileSavingDto) {
        $file = new File(
            $fileSavingDto->getFile()->getExtension(),
            $fileSavingDto->getFile()->getPath()
        );
        $file->setFileName($file->getUuid());
        return $file;
    }
}