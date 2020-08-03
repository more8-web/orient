<?php


namespace App\Services\News;

use App\Entity\Content;
use App\Entity\News;
use App\Exceptions\Common\DatabaseException;
use App\Repository\ContentRepository;
use App\Repository\NewsRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class NewsService
{
    /** @var NewsRepository */
    protected $repo;

    /** @var ContentRepository */
    protected $contentRepo;

    /**
     * NewsService constructor.
     * @param NewsRepository $repo
     * @param ContentRepository $contentRepo
     */
    public function __construct(NewsRepository $repo, ContentRepository $contentRepo)
    {
        $this->repo = $repo;
        $this->contentRepo = $contentRepo;
    }

    /**
     * @return News[]
     */
    public function getNewsList()
    {
        return $this->repo->getNewsList();
    }

    /**
     * @param $id
     * @return News|null
     */
    public function getNewsById($id)
    {
        return $this->repo->getOne($id);
    }

    /**
     * @param $id
     * @return News|null
     */
    public function getReference($id)
    {
        return $this->repo->getReference($id);
    }

    /**
     * @param $alias
     * @param $status
     * @return News
     */
    public function createNews($alias, $status): News
    {
        try {
            return $this->repo->create($alias, $status);
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    /**
     * @param $id
     */
    public function deleteNews($id)
    {
        $this->repo->delete($id);
    }

    /**
     * @param $id
     * @param $alias
     * @param $status
     * @return News|null
     */
    public function editNews($id, $alias, $status)
    {
        try {
            return $this->repo->edit($id, $alias, $status);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }
    }

    /**
     * @param $contentId
     * @param $newsId
     */
    public function bindContentToNews($newsId, $contentId)
    {
        $this->repo->bindToContent(
            $newsId,
            $this->contentRepo->find($contentId)
        );
    }

    /**
     * @param $contentId
     * @param $newsId
     */
    public function unbindContentToNews($newsId, $contentId)
    {
        $this->repo->unbindToContent(
            $newsId,
            $this->contentRepo->find($contentId)
        );
    }

}