<?php


namespace App\Services\Content;


use App\Repository\ContentRepository;

class ContentService
{
    /** @var ContentRepository */
    protected $repo;

    public function __construct(ContentRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $alias
     * @param $desc
     * @param $value
     */
    public function createNewContent($alias, $desc, $value)
    {
        return $this->repo->createContent($alias, $desc, $value);
    }

}