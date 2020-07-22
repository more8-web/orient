<?php

namespace App\Entity;

use App\Repository\ContentCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentCategoriesRepository::class)
 */
class ContentCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="content_category_parent_id")
     */
    private $contentCategoryParentId;

    /**
     * @ORM\Column(type="string", length=255, name="content_category_alias")
     */
    private $contentCategoryAlias;

    /**
     * @ORM\ManyToMany(targetEntity="Content", mappedBy="categories")
     * @ORM\JoinTable(name="content_to_content_category")
     */
    private $content;

    public function __construct()
    {
        $this->content = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentCategoryParentId(): ?int
    {
        return $this->contentCategoryParentId;
    }

    public function setContentCategoryParentId(int $contentCategoryParentId): self
    {
        $this->contentCategoryParentId = $contentCategoryParentId;

        return $this;
    }

    public function getContentCategoryAlias(): ?string
    {
        return $this->contentCategoryAlias;
    }

    public function setContentCategoryAlias(?string $contentCategoryAlias): self
    {
        $this->contentCategoryAlias = $contentCategoryAlias;

        return $this;
    }

    /**
     * @param Content $content
     */
    public function addContent(Content $content)
    {
        $this->content->add($content);
    }

    /**
     * @param Content $content
     */
    public function removeContent(Content $content)
    {
        $this->content->removeElement($content);
    }
}
