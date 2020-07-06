<?php


namespace App\Services\News;


use App\Exceptions\LoginException;
use App\Repository\UserRepository;
use App\Security\TokenService;

class NewsService
{
    /** @var UserRepository */
    protected $repo;

    /**
     * @var TokenService
     */
    protected $token;

    public function __construct(UserRepository $repo, TokenService $token)
    {
        $this->repo = $repo;
        $this->token = $token;
    }


    public function getNewsList($token)
    {
        if ($this->token = $token)
        $newsList = $this->repo->findAll();
        /** @var array $newsList */
        if(is_null($newsList)) {
            throw new LoginException();
        }

        return $newsList;
    }

}