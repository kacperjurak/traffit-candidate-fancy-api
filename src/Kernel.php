<?php

namespace App;


class Kernel
{

    /**
     * @param string $environment
     */
    public function __construct(
        private string $environment,
    )
    {
        // do some work
    }

    /**
     *
     */
    protected function configureApp(): void
    {
        // load and parse config/* files. Configure application.
    }
}