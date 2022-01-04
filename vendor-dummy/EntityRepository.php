<?php

namespace Framework;

use Framework\ORM\QueryBuilder;
use JetBrains\PhpStorm\Pure;

class EntityRepository
{
    /**
     * @param string $entityClass
     */
    public function __construct(private string $entityClass)
    {
        // initialize repository
    }

    /**
     * @param string $alias
     * @return QueryBuilder
     */
    #[Pure] public function createQueryBuilder(string $alias): QueryBuilder
    {
        return new QueryBuilder($alias);
    }
}