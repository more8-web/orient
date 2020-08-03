<?php

namespace App\Entity;

use App\Repository\LogRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Log
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $logValue;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"}, name="created_at")
     */
    private $createdAt;

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
    public function getLogValue(): ?string
    {
        return $this->logValue;
    }

    /**
     * @param string $logValue
     * @return $this
     */
    public function setLogValue(string $logValue): self
    {
        $this->logValue = $logValue;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return $this
     */
    public function setCreatedAt(): self
    {
        $this->createdAt = new DateTime('now');

        return $this;
    }
}
