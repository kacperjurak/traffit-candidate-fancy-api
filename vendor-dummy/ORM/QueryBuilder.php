<?php

namespace Framework\ORM;

class QueryBuilder
{
    private ?Query $query = null;

    /**
     * @param string $alias
     */
    public function __construct(private string $alias)
    {
    }

    /**
     * @param string $where
     * @return $this
     */
    public function andWhere(string $where): QueryBuilder
    {
        // update DB query
        // $this->add('where', $where);
        return $this;
    }

    /**
     * @param string $param
     * @param string $paramValue
     * @return $this
     */
    public function setParameter(string $param, string $paramValue): QueryBuilder
    {
        // set params
        return $this;
    }

    /**
     * @param string $alias
     * @param string $field
     * @return $this
     */
    public function orderByField(string $alias, string $field): QueryBuilder
    {
        // do something
        return $this;
    }

    /**
     * @param string $order
     * @return $this
     */
    public function order(string $order): QueryBuilder
    {
        // do something
        return $this;
    }

    /**
     * @param int $order
     * @return $this
     */
    public function limit(int $order): QueryBuilder
    {
        // do something
        return $this;
    }

    /**
     * @param int $order
     * @return $this
     */
    public function page(int $order): QueryBuilder
    {
        // do something
        return $this;
    }

    /**
     * @return Query
     */
    public function getQuery(): Query
    {
        return $this->query;
    }
}