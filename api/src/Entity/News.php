<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewsRepository;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository", repositoryClass=NewsRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $news_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $news_alias;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $news_status;

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

}