<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Framework\Collection;
use Framework\ORM\Mapping as ORM;
use Framework\SharedInterfaces\CollectionInterface;
use JetBrains\PhpStorm\Pure;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id, ORM\Column(type: 'int'), ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $content;

    #[ORM\ManyToMany(targetEntity: Candidate::class)]
    private CollectionInterface $candidates;

    #[Pure] public function __construct()
    {
        $this->candidates = new Collection();
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Tag
     */
    public function setContent(string $content): Tag
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return CollectionInterface
     */
    public function getCandidates(): CollectionInterface
    {
        return $this->candidates;
    }

    /**
     * @param CollectionInterface $candidates
     * @return Tag
     */
    public function setCandidates(CollectionInterface $candidates): Tag
    {
        $this->candidates = $candidates;
        return $this;
    }
}