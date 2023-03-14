<?php

namespace App\Controller\FileController;

use App\Controller\FileController\Dto\FileSavingDto;
use App\Controller\FileController\Handler\FileSavingHandler;
use App\Controller\FileController\Handler\FileSavingHandlerInterface;
use App\Exception\ValidationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/file')]
class FileController extends AbstractController
{

    #[Route('/create', methods: [Request::METHOD_POST])]
    public function saveFile(Request $request, FileSavingHandlerInterface $fileSavingHandler) {
        $file = $request->files->get('file');

        if (
            (empty($file) || !$file instanceof UploadedFile)
        ) {
            $errors = [];

            if (empty($file) || !$file instanceof \Exception) {
                $errors['file'][] = 'system.error.system_file_upload_error_missing';
                return new JsonResponse($errors, 400);
            }
        }
        $fileSavingDto = new FileSavingDto();
        $fileSavingDto->setFile($file);

        return $fileSavingHandler->handle($fileSavingDto);
    }


}