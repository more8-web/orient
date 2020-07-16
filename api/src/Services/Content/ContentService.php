<?php


namespace App\Services\Content;


use App\Entity\Content;
use App\Exceptions\Content\ContentAlreadyExistsException;
use App\Exceptions\Content\NotFoundContentException;
use App\Repository\ContentRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

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

    public function getOneContentById($id)
    {

        $content = $this->repo->getOne($id);
        if(is_null($content)){
            throw new NotFoundContentException();
        }
        return $content;
    }
}