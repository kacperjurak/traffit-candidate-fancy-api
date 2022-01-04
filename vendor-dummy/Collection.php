<?php

namespace Framework;

use Framework\SharedInterfaces\CollectionInterface;

class Collection implements CollectionInterface
{
    /**
     * @return array
     */
    public function doSomethingOnCollection(): array
    {
        // do something and return array...
        return [];
    }
}