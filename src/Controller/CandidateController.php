<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use App\Response\ErrorResponse;
use App\Response\JsonResponse;
use App\Service\CandidatesFormatter;
use Framework\Response;
use Framework\Router\Annotations\Route;
use Framework\Router\Enums\Method;
use Framework\Validator;

#[Route(path: 'candidates')]
class CandidateController extends PaginateSortController
{
    /**
     * @param CandidateRepository $candidateRepository
     * @param CandidatesFormatter $candidatesFormatter
     */
    public function __construct(private CandidateRepository $candidateRepository, private CandidatesFormatter $candidatesFormatter) // CandidateRepository and CandidatesFormatter are injected via Dependency Injection (like in Symfony)
    {
    }

    #[Route(path: '/', methods: [Method::POST, Method::GET])]
    public function index(): Response
    {
        $phrase = $this->request->get('phrase');

        if ($phrase === null) {
            return new ErrorResponse('phrase parameter can\'t be empty');
        }

        $maxLength = 2000;
        if (!Validator::length($phrase, max: $maxLength)) {
            return new ErrorResponse("search parameter must be maximum $maxLength length");
        }

        $birthFrom = $this->request->get('birth_from');
        $birthTo = $this->request->get('birth_to');

        if (
            ($birthFrom !== null && !Validator::dateFormat($birthFrom)) ||
            ($birthTo !== null && !Validator::dateFormat($birthTo))
        ) {
            return new ErrorResponse('date should be in YYYY-MM-DD format');
        }

        $candidates = $this->candidateRepository->findByCvContentAndBirthDate($phrase, $birthFrom, $birthTo, $this->sort, $this->field, $this->page, $this->limit);

        if ($this->request->getMethod() === Method::POST) {
            $candidates = $this->candidatesFormatter->format($candidates, $this->request->getContent());
        }

        return new JsonResponse($candidates);
    }
}