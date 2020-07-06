<?php

namespace App\Entity;

use App\Repository\NewsCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsCategoriesRepository::class)
 */
class NewsCategories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $news_category_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $news_category_parent_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $news_category_alias;

    public function getNewsCategoryId(): ?int
    {
        return $this->news_category_id;
    }

    public function setNewsCategoryId(int $news_category_id): self
    {
        $this->news_category_id = $news_category_id;

        return $this;
    }

    public function getNewsCategoryParentId(): ?int
    {
        return $this->news_category_parent_id;
    }

    public function setNewsCategoryParentId(?int $news_category_parent_id): self
    {
        $this->news_category_parent_id = $news_category_parent_id;

        return $this;
    }

    public function getNewsCategoryAlias(): ?string
    {
        return $this->news_category_alias;
    }

    public function setNewsCategoryAlias(string $news_category_alias): self
    {
        $this->news_category_alias = $news_category_alias;

        return $this;
    }
}
