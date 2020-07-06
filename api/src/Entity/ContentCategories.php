<?php

namespace App\Entity;

use App\Repository\ContentCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentCategoriesRepository::class)
 */
class ContentCategories
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
    private $content_category_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $content_category_parent_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content_category_alias;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContentCategoryParentId(): ?int
    {
        return $this->content_category_parent_id;
    }

    public function setContentCategoryParentId(int $content_category_parent_id): self
    {
        $this->content_category_parent_id = $content_category_parent_id;

        return $this;
    }

    public function getContentCategoryAlias(): ?string
    {
        return $this->content_category_alias;
    }

    public function setContentCategoryAlias(?string $content_category_alias): self
    {
        $this->content_category_alias = $content_category_alias;

        return $this;
    }
}
