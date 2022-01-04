<?php

namespace Framework\SharedInterfaces;

interface EntityManagerInterface
{
    public function find($className, $id);
}