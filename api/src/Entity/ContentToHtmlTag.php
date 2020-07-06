<?php

namespace App\Entity;

use App\Repository\ContentToHtmlTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentToHtmlTagRepository::class)
 */
class ContentToHtmlTag
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
    private $html_tag_id;

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

    public function getHtmlTagId(): ?int
    {
        return $this->html_tag_id;
    }

    public function setHtmlTagId(int $html_tag_id): self
    {
        $this->html_tag_id = $html_tag_id;

        return $this;
    }
}
