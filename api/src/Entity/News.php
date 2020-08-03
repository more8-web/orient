<?php


namespace App\Entity;

use App\Exceptions\NewsCategory\NewsCategoryNotFoundException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewsRepository;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $news_alias;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $news_status;

    /**
     * @ORM\ManyToMany(targetEntity="NewsCategory", inversedBy="news")
     * @ORM\JoinTable(name="news_to_news_category")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Content", inversedBy="news")
     * @ORM\JoinTable(name="content_to_news")
     */
    private $contents;

    /**
     * @ORM\ManyToMany(targetEntity="Keyword", mappedBy="news")
     * @ORM\JoinTable(name="keyword_to_news")
     */
    private $keywords;

    /**
     * News constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->contents = new ArrayCollection();
        $this->keywords = new ArrayCollection();
    }

    /**
     * @return mixed
     */public function getNewsAlias()
    {
        return $this->news_alias;

    }/**
     * @param mixed $news_alias
     */public function setNewsAlias($news_alias): void
    {
        $this->news_alias = $news_alias;
    }

    /**
     * @return mixed
     */
    public function getNewsStatus()
    {
        return $this->news_status;
    }

    /**
     * @param mixed $news_status
     */
    public function setNewsStatus($news_status): void
    {
        $this->news_status = $news_status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return News
     */
    public function setId($id): News
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param NewsCategory $category
     */
    public function addCategory(NewsCategory $category)
    {
        $category->addNews($this);
        $this->categories->add($category);
    }

    /**
     * @param NewsCategory $category
     */
    public function removeCategory(NewsCategory $category)
    {
        $category->removeNews($this);
        $this->categories->removeElement($category);
    }

    /**
     * @param Content $content
     */
    public function addContent(Content $content)
    {
        $content->addNews($this);
        $this->contents->add($content);
    }

    /**
     * @param Content $content
     */
    public function removeContent(Content $content)
    {
        $content->removeNews($this);
        $this->contents->removeElement($content);
    }

    /**
     * @param Keyword $keyword
     */
    public function addKeyword(Keyword $keyword)
    {
        $this->keywords->add($keyword);
    }

    /**
     * @param Keyword $keyword
     */
    public function removeKeyword(Keyword $keyword)
    {
        $this->keywords->removeElement($keyword);
    }

    /**
     * @return Collection
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    /**
     * @return Collection
     */
    public function getKeywords(): Collection
    {
        return $this->keywords;
    }
}