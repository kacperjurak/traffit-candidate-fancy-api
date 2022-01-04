<?php

namespace App\Controller;

use App\Enum\Sort;
use Framework\AbstractController;

class PaginateSortController extends AbstractController
{
    protected Sort $sort = Sort::ASC;
    protected ?string $field = null;
    protected ?int $page = null;
    protected ?int $limit = null;

    /**
     *
     */
    public function initialize()
    {
        $this->sort = $this->request->get('sort') === Sort::DESC->value ? Sort::DESC : Sort::ASC;
        $this->field = $this->request->get('field');
        $this->page = $this->request->get('page');
        $this->limit = $this->request->get('limit');
    }
}