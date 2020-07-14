<?php

namespace App\Services\ContentCategory;

use App\Entity\ContentCategory;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\ContentCategory\ContentCategoryAlreadyExistsException;
use App\Exceptions\ContentCategory\ParentCategoryNotExistsException;
use App\Repository\ContentCategoriesRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class CreateContentCategoryService
{
    /** @var ContentCategoriesRepository */
    protected $repo;

    public function __construct(ContentCategoriesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $alias
     * @param $parentId
     * @return ContentCategory
     */
    public function createContentCategory($alias, $parentId = null): ContentCategory
    {
        if (!$this->repo->find($parentId)) {
            throw new ParentCategoryNotExistsException();
        }

        try {
            $contentCategory = $this->repo->addContentCategory($parentId, $alias);
        } catch (UniqueConstraintViolationException $e) {
            throw new ContentCategoryAlreadyExistsException();
        } catch (ORMException | OptimisticLockException $e) {
            throw new DatabaseException();
        }
        return $contentCategory;
    }
}