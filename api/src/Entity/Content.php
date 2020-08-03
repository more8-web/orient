<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ContentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentRepository::class)
 */
class Content
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
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

    /**
     * @ORM\ManyToMany(targetEntity="ContentCategory", inversedBy="content")
     * @ORM\JoinTable(name="content_to_content_category")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Keyword", mappedBy="contents")
     * @ORM\JoinTable(name="keyword_to_content")
     */
    private $keywords;

    /**
     * @ORM\ManyToMany(targetEntity="News", mappedBy="contents")
     * @ORM\JoinTable(name="content_to_news")
     */
    private $news;

    /**
     * @ORM\ManyToMany(targetEntity="HtmlTag", mappedBy="contents")
     * @ORM\JoinTable(name="content_to_html_tag")
     */
    private $htmlTags;

    /**
     * Content constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->keywords = new ArrayCollection();
        $this->news = new ArrayCollection();
        $this->htmlTags = new ArrayCollection();
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
    public function getContentAlias(): ?string
    {
        return $this->content_alias;
    }

    /**
     * @param string $content_alias
     * @return $this
     */
    public function setContentAlias(string $content_alias): self
    {
        $this->content_alias = $content_alias;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContentDescription(): ?string
    {
        return $this->content_description;
    }

    /**
     * @param string|null $content_description
     * @return $this
     */
    public function setContentDescription(?string $content_description): self
    {
        $this->content_description = $content_description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContentValue(): ?string
    {
        return $this->content_value;
    }

    /**
     * @param string $content_value
     * @return $this
     */
    public function setContentValue(string $content_value): self
    {
        $this->content_value = $content_value;

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

    /**
     * @param ContentCategory $contentCategory
     */
    public function addCategories(ContentCategory $contentCategory)
    {
        $contentCategory->addContent($this);
        $this->categories->add($contentCategory);
    }

    /**
     * @param ContentCategory $contentCategory
     */
    public function removeCategories(ContentCategory $contentCategory)
    {
        $contentCategory->removeContent($this);
        $this->categories->removeElement($contentCategory);
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
     * @param HtmlTag $htmlTag
     */
    public function addHtmlTags(HtmlTag $htmlTag)
    {
        $this->htmlTags->add($htmlTag);
    }

    /**
     * @param HtmlTag $htmlTag
     */
    public function removeHtmlTags(HtmlTag $htmlTag)
    {
        $this->htmlTags->removeElement($htmlTag);
    }

    /**
     * @return Collection
     */
    public function getKeywords(): Collection
    {
        return $this->keywords;
    }

    /**
     * @return Collection
     */
    public function getHtmlTags(): Collection
    {
        return $this->htmlTags;
    }
}
