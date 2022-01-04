<?php

namespace Framework;

use Framework\Router\Enums\Method;

class Request
{
    /**
     * @param string $param
     * @return mixed
     */
    public function get(string $param): mixed
    {
        /* logic to get POST param value from http request */
        $paramValue = '';

        return $paramValue;
    }

    public function getMethod(): Method
    {
        /* logic to get http mehod */

        // for new POST is hardcoded
        return Method::POST;
    }

    public function getContent(): string
    {
        /* logic to get content from POST http request */
        $content = '';

        return $content;
    }
}