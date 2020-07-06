<?php

namespace App\Entity;

use App\Repository\ContentToKeywordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentToKeywordRepository::class)
 */
class ContentToKeyword
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
    private $content_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $keyword_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentId(): ?int
    {
        return $this->content_id;
    }

    public function setContentId(int $content_id): self
    {
        $this->content_id = $content_id;

        return $this;
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
}
