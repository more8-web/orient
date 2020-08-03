<?php


namespace App\Services\NewsCategory;


use App\Entity\News;
use App\Entity\NewsCategory;
use App\Exceptions\Keyword\NotFoundKeywordException;
use App\Exceptions\NewsCategory\NewsCategoryAlreadyExistsException;
use App\Repository\NewsCategoryRepository;
use App\Repository\NewsRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class NewsCategoryService
{

    /** @var NewsCategoryRepository */
    protected $repo;

    protected $newsRepo;

    public function __construct(NewsCategoryRepository $repo, NewsRepository $newsRepo)
    {
        $this->repo = $repo;
        $this->newsRepo = $newsRepo;
    }

    /**
     * @param $parentId
     * @param $newsCategoryAlias
     * @return NewsCategory
     */
    public function createNewsCategory($parentId, $newsCategoryAlias)
    {
        if(!$this->repo->isNewsCategoryExists($newsCategoryAlias)) {
            try {
                return $this->repo->create($parentId, $newsCategoryAlias);
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
        }
        throw new NewsCategoryAlreadyExistsException();
    }

    /**
     * @param $id
     * @param $parentId
     * @param $alias
     * @return NewsCategory
     */
    public function editNewsCategoryById($id, $parentId, $alias)
    {
        try {
            $newsCategory =  $this->repo->edit($id, $parentId, $alias);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        /** @var NewsCategory $newsCategory */
        return $newsCategory;
    }

    /**
     * @param $id
     * @return null
     */
    public function deleteNewsCategory($id)
    {
        try {
            $this->repo->delete($id);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        return null;
    }

    /**
     * @return NewsCategory[]
     */
    public function getNewsCategoryList()
    {
        return $this->repo->getNewsCategoryList();
    }

    /**
     * @param $id
     * @return NewsCategory|null
     */
    public function getOneNewsCategoryById($id)
    {
        try {
            return $this->repo->getOneNewsCategory($id);
        }catch (BadRequestHttpException $e) {
        } throw new NotFoundKeywordException();
    }

    /**
     * @param $id
     * @return NewsCategory|null
     */
    public function getReference($id)
    {
        return $this->repo->getReference($id);
    }

    /**
     * @param $newsId
     * @param $categoryId
     */
    public function bindNewsToCategory($categoryId, $newsId)
    {
        $this->repo->bindToNews(
            $categoryId,
            $this->newsRepo->find($newsId)
        );
    }

    /**
     * @param $newsId
     * @param $categoryId
     */
    public function unbindNewsToCategory($categoryId, $newsId)
    {
        $this->repo->unbindToNews(
            $categoryId,
            $this->newsRepo->find($newsId)
        );
    }
}