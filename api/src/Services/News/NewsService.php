<?php


namespace App\Services\News;


use App\Entity\News;
use App\Exceptions\Common\DatabaseException;
use App\Repository\NewsCategoryRepository;
use App\Repository\NewsRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class NewsService
{
    /** @var NewsRepository */
    protected $repo;

    /** @var NewsCategoryRepository */
    protected $repoCategory;

    public function __construct(NewsRepository $repo, NewsCategoryRepository $repoCategory)
    {
        $this->repo = $repo;
        $this->repoCategory = $repoCategory;
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
     * @return News
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
     * @param $newsId
     * @param $categoryId
     */
    public function bindNewsToCategory($newsId, $categoryId)
    {
        $this->repo->bindToCategory(
            $newsId,
            $this->repoCategory->find($categoryId)
        );
    }

    /**
     * @param $newsId
     * @param $categoryId
     */
    public function unbindNewsToCategory($newsId, $categoryId)
    {
        $this->repo->unbindToCategory(
            $newsId,
            $this->repoCategory->find($categoryId)
        );
    }
}