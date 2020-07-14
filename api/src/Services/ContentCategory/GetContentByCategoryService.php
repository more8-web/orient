<?php


namespace App\Services\ContentCategory;


use App\Repository\NewsRepository;
use App\Security\TokenService;

class GetContentByCategoryService
{
    /** @var NewsRepository */
    protected $repo;

    /**
     * @var TokenService
     */
    protected $token;

    public function __construct(NewsRepository $repo, TokenService $token)
    {
        $this->repo = $repo;
        $this->token = $token;
    }


    public function getNewsList($filter = null)
    {
        return $this->repo->findAll();
    }

    public function createNewArticle($parameters)
    {
        $status = "status";
        return $this->repo->createNews($parameters, $status);
    }

}