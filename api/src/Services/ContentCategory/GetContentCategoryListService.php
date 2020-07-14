<?php


namespace App\Services\ContentCategory;


use App\Entity\ContentCategory;
use App\Repository\ContentCategoriesRepository;

class GetContentCategoryListService
{
    /** @var ContentCategoriesRepository */
    protected $repo;

    /**
     * GetContentCategoryListService constructor.
     * @param ContentCategoriesRepository $repo
     */
    public function __construct(ContentCategoriesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @return ContentCategory[]
     */
    public function getContentCategoryList()
    {
        return $this->repo->findAll();
    }
}