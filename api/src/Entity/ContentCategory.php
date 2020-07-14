<?php

namespace App\Entity;

use App\Repository\ContentCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity(repositoryClass=ContentCategoriesRepository::class)
 * @Table(name="content_category",
 *    uniqueConstraints={
 *        @UniqueConstraint(name="category_unique",
 *            columns={"content_category_parent_id", "content_category_alias"})
 *    }
 * )
 * @ORM\HasLifecycleCallbacks
 */
class ContentCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="integer", name="content_category_parent_id")
     */
    private ?int $contentCategoryParentId;

    /**
     * @ORM\Column(type="string", length=255, name="content_category_alias")
     */
    private ?string $contentCategoryAlias;

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
}
