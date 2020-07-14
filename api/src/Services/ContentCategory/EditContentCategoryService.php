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

class EditContentCategoryService
{
    /** @var ContentCategoriesRepository */
    protected $repo;

    /**
     * EditContentCategoryService constructor.
     * @param ContentCategoriesRepository $repo
     */
    public function __construct(ContentCategoriesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $id
     * @param null $parentId
     * @param $alias
     * @return ContentCategory
     */
    public function editContentCategory($id, $parentId = null, $alias): ContentCategory
    {
        if (!$this->repo->find($parentId)) {
            throw new ParentCategoryNotExistsException();
        }

        try {
            $contentCategory = $this->repo->setContentCategory($id, $parentId, $alias);
        } catch (UniqueConstraintViolationException $e) {
            throw new ContentCategoryAlreadyExistsException();
        } catch (ORMException | OptimisticLockException $e) {
            throw new DatabaseException();
        }
        return $contentCategory;
    }

}