<?php

namespace App\Entity;

use App\Repository\KeywordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeywordRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $keyword_value;

    /**
     * @ORM\ManyToMany(targetEntity="Content", inversedBy="keywords")
     * @ORM\JoinTable(name="keyword_to_content")
     */
    private $contents;

    /**
     * @ORM\ManyToMany(targetEntity="News", inversedBy="keywords")
     * @ORM\JoinTable(name="keyword_to_news")
     */
    private $news;

    public function __construct()
    {
        $this->contents = new ArrayCollection();
        $this->news = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getKeywordValue(): ?string
    {
        return $this->keyword_value;
    }

    /**
     * @param string $keyword_value
     * @return $this
     */
    public function setKeywordValue(string $keyword_value): self
    {
        $this->keyword_value = $keyword_value;

        return $this;
    }

    /**
     * @param News $news
     */
    public function addNews(News $news)
    {
        $news->addKeyword($this);
        $this->news->add($news);
    }

    /**
     * @param News $news
     */
    public function removeNews(News $news)
    {
        $news->removeKeyword($this);
        $this->news->removeElement($news);
    }

    /**
     * @param Content $content
     */
    public function addContent(Content $content)
    {
        $content->addKeyword($this);
        $this->contents->add($content);
    }

    /**
     * @param Content $content
     */
    public function removeContent(Content $content)
    {
        $content->removeKeyword($this);
        $this->contents->removeElement($content);
    }
}
