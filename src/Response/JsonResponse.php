<?php

namespace App\Response;

use Framework\Response;

class JsonResponse extends Response
{
    public function __construct(private array $jsonArray)
    {
        parent::__construct(json_encode($jsonArray));
    }
}