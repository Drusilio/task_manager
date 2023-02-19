<?php

namespace App\Controller\TaskController\Dto;



use Symfony\Component\Uid\Uuid;

class DeleteTaskDto
{
    private Uuid $taskUuid;

    /**
     * @param Uuid $taskUuid
     */
    public function __construct(Uuid $taskUuid)
    {
        $this->taskUuid = $taskUuid;
    }

    /**
     * @return Uuid
     */
    public function getTaskUuid(): Uuid
    {
        return $this->taskUuid;
    }

    /**
     * @param Uuid $taskUuid
     */
    public function setTaskUuid(Uuid $taskUuid): void
    {
        $this->taskUuid = $taskUuid;
    }



}