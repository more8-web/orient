<?php


namespace App\Services\ContentCategory;


use App\Exceptions\Common\DatabaseException;
use App\Repository\ContentCategoriesRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class DeleteContentCategoryService
{
    /** @var ContentCategoriesRepository */
    protected ContentCategoriesRepository $repo;

    public function __construct(ContentCategoriesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteContentCategory($id): bool
    {

        try {
            $this->repo->deleteContentCategory($id);
        } catch (ORMException | OptimisticLockException $e) {
            throw new DatabaseException();
        }
        return true;
    }

}