<?php

namespace App\Entity;

use App\Repository\ContentToNewsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentToNewsRepository::class)
 */
class ContentToNews
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
    private $content_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentId(): ?int
    {
        return $this->content_id;
    }

    public function setContentId(int $content_id): self
    {
        $this->content_id = $content_id;

        return $this;
    }
}
