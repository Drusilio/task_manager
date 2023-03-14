<?php

namespace App\Controller\FileController\Dto;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileSavingDto
{
    private UploadedFile $file;

    public function getFile(): UploadedFile
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file): void
    {
        $this->file = $file;
    }


}