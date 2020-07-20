<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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

    public function __construct()
    {
        $this->categories = new ArrayCollection();
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
}