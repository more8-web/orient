<?php

namespace App\Entity;

use App\Repository\NewsToNewsCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity(repositoryClass=NewsToNewsCategoryRepository::class)
 * @ORM\Table(name="news_to_news_category",
 *    uniqueConstraints={
 *        @UniqueConstraint(name="news_category_unique",
 *            columns={"news_id", "news_category_id"})
 *    }
 * )
 */
class NewsToNewsCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="news_id")
     */
    private $newsId;

    /**
     * @ORM\Column(type="integer", name="news_category_id")
     */
    private $categoryId;
}
