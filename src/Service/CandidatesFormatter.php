<?php

namespace App\Service;

use App\Entity\Candidate;

class CandidatesFormatter
{
    /**
     * @param Candidate[] $candidates
     * @param string $format
     * @return Candidate[]
     */
    public function format(array $candidates, string $format): array
    {
        // format data as requested
        return [];
    }
}