<?php

namespace App\Response;

class ErrorResponse extends JsonResponse
{
    public function __construct(private string $error)
    {
        parent::__construct(['error' => $error]);
    }
}