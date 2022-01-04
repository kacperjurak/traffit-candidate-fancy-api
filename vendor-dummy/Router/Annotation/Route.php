<?php

namespace Framework\Router\Annotations;

use Attribute;
use Framework\Router\Enums\Method;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
final class Route
{
    public function __construct(private string $path, private array $methods = [Method::GET, Method::POST, Method::PUT, Method::PATCH, Method::DELETE])
    {
    }
}