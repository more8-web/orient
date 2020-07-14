<?php

namespace App\Entity;

use App\Repository\KeywordsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeywordsRepository::class)
 */
class Keyword
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $keyword_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $keyword_value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeywordId(): ?int
    {
        return $this->keyword_id;
    }

    public function setKeywordId(int $keyword_id): self
    {
        $this->keyword_id = $keyword_id;

        return $this;
    }

    public function getKeywordValue(): ?string
    {
        return $this->keyword_value;
    }

    public function setKeywordValue(string $keyword_value): self
    {
        $this->keyword_value = $keyword_value;

        return $this;
    }
}
