<?php

namespace App\Entity;

use App\Repository\ContentToContentCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentToContentCategoryRepository::class)
 */
class ContentToContentCategory
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
    private $content_category_id;

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

    public function getContentCategoryId(): ?int
    {
        return $this->content_category_id;
    }

    public function setContentCategoryId(int $content_category_id): self
    {
        $this->content_category_id = $content_category_id;

        return $this;
    }
}
