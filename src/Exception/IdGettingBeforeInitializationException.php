<?php

declare(strict_types=1);

namespace App\Exception;

use LogicException;
use Throwable;

class IdGettingBeforeInitializationException extends LogicException
{
    public function __construct(string $className, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(sprintf('Cant\'t get id for entity "%s" before saving to db.', $className), $code, $previous);
    }
}
