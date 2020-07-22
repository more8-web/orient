<?php

namespace App\Entity;

use App\Repository\HtmlTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HtmlTagRepository::class)
 */
class HtmlTag
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
    private $htmlTagValue;

    /**
     * @ORM\ManyToMany(targetEntity="content", inversedBy="html_tags")
     * @ORM\JoinTable(name="content_to_html_tag")
     */
    private $contents;

    public function __construct()
    {
        $this->contents = new ArrayCollection();
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
    public function getHtmlTagValue(): ?string
    {
        return $this->htmlTagValue;
    }

    /**
     * @param string $htmlTagValue
     * @return $this
     */
    public function setHtmlTagValue(string $htmlTagValue): self
    {
        $this->htmlTagValue = $htmlTagValue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContents(): ?string
    {
        return $this->contents;
    }

    /**
     * @param string $contents
     * @return $this
     */
    public function setContents(string $contents): self
    {
        $this->contents = $contents;

        return $this;
    }

    /**
     * @param Content $content
     */
    public function addContent(Content $content)
    {
        $content->addHtmlTags($this);
        $this->contents->add($content);
    }

    /**
     * @param Content $content
     */
    public function removeContent(Content $content)
    {
        $content->removeHtmlTags($this);
        $this->contents->removeElement($content);
    }
}
