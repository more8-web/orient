<?php

namespace App\Entity;

use App\Repository\NewsToNewsCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsToNewsCategoryRepository::class)
 */
class NewsToNewsCategory
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
    private $news_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsId(): ?int
    {
        return $this->news_id;
    }

    public function setNewsId(int $news_id): self
    {
        $this->news_id = $news_id;

        return $this;
    }
}
