<?php

namespace Framework\Router\Enums;

enum Method: int
{
    case GET = 1;
    case POST = 2;
    case PUT = 4;
    case PATCH = 8;
    case DELETE = 16;
}