<?php

namespace App\Entity;

use App\Repository\NewsCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsCategoryRepository::class)
 */
class NewsCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $news_category_parent_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $news_category_alias;

    /**
     * @ORM\ManyToMany(targetEntity="News", mappedBy="categories")
     * @ORM\JoinTable(name="news_to_news_category")
     */
    private $news;

    public function __construct()
    {
        $this->news = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getNewsCategoryId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getNewsCategoryParentId(): ?int
    {
        return $this->news_category_parent_id;
    }

    /**
     * @param int|null $news_category_parent_id
     * @return $this
     */
    public function setNewsCategoryParentId(?int $news_category_parent_id): self
    {
        $this->news_category_parent_id = $news_category_parent_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewsCategoryAlias(): ?string
    {
        return $this->news_category_alias;
    }

    /**
     * @param string $news_category_alias
     * @return $this
     */
    public function setNewsCategoryAlias(string $news_category_alias): self
    {
        $this->news_category_alias = $news_category_alias;

        return $this;
    }

    /**
     * @param News $news
     */
    public function addNews(News $news)
    {
        $this->news->add($news);
    }

    /**
     * @param News $news
     */
    public function removeNews(News $news)
    {
        $this->news->removeElement($news);
    }
}
