<?php

namespace App\Repository;

use App\Enum\Sort;
use DateTimeInterface;
use Framework\EntityRepository;

class CandidateRepository extends EntityRepository
{
    /**
     * @param string $phrase
     * @param DateTimeInterface|null $birthFrom
     * @param DateTimeInterface|null $birthTo
     * @param Sort $sort
     * @param string|null $field
     * @param int|null $page
     * @param int|null $limit
     * @return array
     */
    public function findByCvContentAndBirthDate(string $phrase, ?DateTimeInterface $birthFrom = null, ?DateTimeInterface $birthTo = null, Sort $sort = Sort::ASC, ?string $field = null, ?int $page = null, ?int $limit = null): array
    {
        $queryBuilder = $this->createQueryBuilder('c')
            ->andWhere('c.cvContent LIKE :phrase')
            ->setParameter('phrase', $phrase);

        if ($birthFrom !== null) {
            $queryBuilder
                ->andWhere('c.birthDate >= :birthFrom')
                ->setParameter('birthFrom', $birthFrom->format('Y-m-d'));
        }

        if ($birthTo !== null) {
            $queryBuilder
                ->andWhere('c.birthDate <= :birthTo')
                ->setParameter('birthTo', $birthTo->format('Y-m-d'));
        }

        if ($field !== null) {
            $queryBuilder
                ->orderByField('c', ':orderField')
                ->setParameter('orderField', $field)
                ->order(':sort')
                ->setParameter('sort', $sort->value);
        }

        if ($page !== null && $limit !== null) {
            $queryBuilder
                ->limit(':limit')
                ->setParameter('limit', $limit)
                ->page(':page') // For sure it's different in real life, but it's just for example
                ->setParameter('page', $page);
        }

        return $queryBuilder->getQuery()->getResult();

    }
}