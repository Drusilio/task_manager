<?php

namespace App\Infrastructure\ArgumentResolver;

use App\Infrastructure\Request\RequestDeserializerInterface;
use Symfony\Component\HttpFoundation\Request;

class DefaultCommandFactory
{
    public function __construct(private RequestDeserializerInterface $deserializer)
    {
    }

    public function create(Request $request, string $className): mixed
    {
        return $this->deserializer->deserialize($request, $className);
    }
}
