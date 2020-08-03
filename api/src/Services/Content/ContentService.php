<?php


namespace App\Services\Content;


use App\Entity\Content;
use App\Exceptions\Content\ContentAlreadyExistsException;
use App\Exceptions\Content\NotFoundContentException;
use App\Repository\ContentCategoriesRepository;
use App\Repository\ContentRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class ContentService
{
    /** @var ContentRepository */
    protected $repo;

    /**
     * @var ContentCategoriesRepository
     */
    protected $categoryRepo;

    public function __construct(ContentRepository $repo,
                                ContentCategoriesRepository $categoryRepo)
    {
        $this->repo = $repo;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * @param $alias
     * @param $desc
     * @param $value
     * @return Content
     */
    public function createNewContent($alias, $desc, $value)
    {
        if(!$this->repo->isContentExists($alias)) {
            try {
                return $this->repo->create($alias, $desc, $value);
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
        }
        throw new ContentAlreadyExistsException();
    }

    /**
     * @param $id
     * @param $alias
     * @param $desc
     * @param $value
     * @return Content|null
     */
    public function editContent($id, $alias, $desc, $value)
    {
        try {
            $content =  $this->repo->edit($id, $alias, $desc, $value);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        /** @var Content $content */
        return $content;
    }

    /**
     * @param $id
     * @return null
     */
    public function deleteContent($id)
    {
        try {
            $this->repo->delete($id);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        return null;
    }

    /**
     * @param $id
     * @return Content
     */
    public function getOneContentById($id)
    {

        $content = $this->repo->getOne($id);
        if(is_null($content)){
            throw new NotFoundContentException();
        }
        return $content;
    }

    /**
     * @return Content[]
     */
    public function getContentList()
    {
        return $this->repo->getContentList();
    }



    /**
     * @param $id
     * @return Content[]
     */
    public function getContentListByCategory($id)
    {
        return $this->repo->getContentListByCategory($id);
    }

    /**
     * @param $category
     * @param $content
     * @return Content|null
     */
    public function getContentByCategory($category, $content)
    {
        return $this->repo->getContentByCategory($category, $content);
    }

    /**
     * @param $newsId
     * @return Content[]
     */
    public function getContentListByNews($newsId)
    {
        return $this->repo->getContentListByNews($newsId);
    }

    /**
     * @param $newsId
     * @param $content
     * @return Content|null
     */
    public function getContentByNews($newsId, $content)
    {
        /** @var ContentRepository $newsId */
        return $this->repo->getContentByNews($newsId, $content);
    }
}