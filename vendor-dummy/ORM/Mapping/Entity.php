<?php

namespace Framework\ORM\Mapping;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class Entity
{
    public function __construct(public string $repositoryClass)
    {
    }
}