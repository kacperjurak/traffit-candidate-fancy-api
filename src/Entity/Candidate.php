<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use DateTimeInterface;
use Framework\Collection;
use Framework\ORM\Mapping as ORM;
use Framework\SharedInterfaces\CollectionInterface;
use JetBrains\PhpStorm\Pure;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate
{
    #[ORM\Id, ORM\Column(type: 'int'), ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $firstName;

    #[ORM\Column(type: 'string')]
    private string $lastName;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $birthDate;

    #[ORM\Column(type: 'text')]
    private string $notes;

    #[ORM\Column(type: 'text')]
    private string $cvContent;

    #[ORM\ManyToMany(targetEntity: Tag::class)]
    private CollectionInterface $tags;

    #[Pure] public function __construct()
    {
        $this->tags = new Collection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Candidate
     */
    public function setFirstName(string $firstName): Candidate
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Candidate
     */
    public function setLastName(string $lastName): Candidate
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeInterface $birthDate
     * @return Candidate
     */
    public function setBirthDate(DateTimeInterface $birthDate): Candidate
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Candidate
     */
    public function setNotes(string $notes): Candidate
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string
     */
    public function getCvContent(): string
    {
        return $this->cvContent;
    }

    /**
     * @param string $cvContent
     * @return Candidate
     */
    public function setCvContent(string $cvContent): Candidate
    {
        $this->cvContent = $cvContent;
        return $this;
    }

    /**
     * @return CollectionInterface
     */
    public function getTags(): CollectionInterface
    {
        return $this->tags;
    }

    /**
     * @param CollectionInterface $tags
     * @return Candidate
     */
    public function setTags(CollectionInterface $tags): Candidate
    {
        $this->tags = $tags;
        return $this;
    }
}