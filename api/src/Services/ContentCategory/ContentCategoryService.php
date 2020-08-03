<?php

namespace App\Services\ContentCategory;

use App\Entity\ContentCategory;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\ContentCategory\ContentCategoryAlreadyExistsException;
use App\Exceptions\ContentCategory\ParentCategoryNotExistsException;
use App\Repository\ContentCategoriesRepository;
use App\Repository\ContentRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class ContentCategoryService
{
    /** @var ContentCategoriesRepository */
    protected $repo;

    /**
     * @var ContentRepository
     */
    protected $contentRepo;

    /**
     * ContentCategoryService constructor.
     * @param ContentCategoriesRepository $repo
     * @param ContentRepository $contentRepository
     */
    public function __construct(ContentCategoriesRepository $repo, ContentRepository $contentRepository)
    {
        $this->repo = $repo;
        $this->contentRepo = $contentRepository;
    }

    /**
     * @param $alias
     * @param $parentId
     * @return ContentCategory
     */
    public function createContentCategory($alias, $parentId = null): ContentCategory
    {

        try {
            $contentCategory = $this->repo->create($parentId, $alias);
        } catch (UniqueConstraintViolationException $e) {
            throw new ContentCategoryAlreadyExistsException();
        } catch (ORMException | OptimisticLockException $e) {
            throw new DatabaseException();
        }
        return $contentCategory;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteContentCategory($id): bool
    {
        try {
            $this->repo->delete($id);
        } catch (ORMException | OptimisticLockException $e) {
            throw new DatabaseException();
        }
        return true;
    }

    /**
     * @param $id
     * @param null $parentId
     * @param $alias
     * @return ContentCategory
     */
    public function editContentCategory($id, $parentId, $alias): ContentCategory
    {
        if (!$this->repo->find($parentId)) {
            throw new ParentCategoryNotExistsException();
        }

        try {
            $contentCategory = $this->repo->edit($id, $parentId, $alias);
        } catch (UniqueConstraintViolationException $e) {
            throw new ContentCategoryAlreadyExistsException();
        } catch (ORMException | OptimisticLockException $e) {
            throw new DatabaseException();
        }
        return $contentCategory;
    }

    /**
     * @return ContentCategory[]
     */
    public function getContentCategoryList()
    {
        return $this->repo->getContentCategoryList();
    }

    /**
     * @param $id
     * @return ContentCategory|null
     */
    public function getContentCategoryById($id)
    {
        return $this->repo->getOne($id);
    }

    /**
     * @param $contentId
     * @param $categoryId
     */
    public function bindContentToContentCategory($categoryId, $contentId)
    {
        $this->repo->bindToContent(
            $categoryId,
            $this->contentRepo->find($contentId)
        );
    }

    /**
     * @param $contentId
     * @param $categoryId
     */
    public function unbindContentToContentCategory($categoryId, $contentId)
    {
        $this->repo->unbindToContent(
            $categoryId,
            $this->contentRepo->find($contentId)
        );
    }
}