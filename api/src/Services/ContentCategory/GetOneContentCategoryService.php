<?php


namespace App\Services\ContentCategory;


use App\Repository\ContentCategoriesRepository;

class GetOneContentCategoryService
{
    /** @var ContentCategoriesRepository */
    protected $repo;

    public function __construct(ContentCategoriesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getOneContent($id)
    {
        return $this->repo->getOneContentCategoryById($id);
    }
}