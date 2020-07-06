<?php

namespace App\Entity;

use App\Repository\NewsLogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsLogRepository::class)
 */
class NewsLog
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
    private $news_log_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $news_log_comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsLogId(): ?int
    {
        return $this->news_log_id;
    }

    public function setNewsLogId(int $news_log_id): self
    {
        $this->news_log_id = $news_log_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getNewsLogComment(): ?string
    {
        return $this->news_log_comment;
    }

    public function setNewsLogComment(string $news_log_comment): self
    {
        $this->news_log_comment = $news_log_comment;

        return $this;
    }
}
