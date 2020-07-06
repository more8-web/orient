<?php

namespace App\Entity;

use App\Repository\ContentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentsRepository::class)
 */
class Contents
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
     * @ORM\Column(type="string", length=255)
     */
    private $content_alias;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content_value;

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

    public function getContentAlias(): ?string
    {
        return $this->content_alias;
    }

    public function setContentAlias(string $content_alias): self
    {
        $this->content_alias = $content_alias;

        return $this;
    }

    public function getContentDescription(): ?string
    {
        return $this->content_description;
    }

    public function setContentDescription(?string $content_description): self
    {
        $this->content_description = $content_description;

        return $this;
    }

    public function getContentValue(): ?string
    {
        return $this->content_value;
    }

    public function setContentValue(string $content_value): self
    {
        $this->content_value = $content_value;

        return $this;
    }
}
