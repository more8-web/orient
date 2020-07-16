<?php


namespace App\Services\Keyword;


use App\Entity\Keyword;
use App\Exceptions\Keyword\KeywordAlreadyExistsException;
use App\Exceptions\Keyword\NotFoundKeywordException;
use App\Repository\KeywordRepository;
use Doctrine\DBAL\Exception\DatabaseObjectExistsException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class KeywordService
{
    /** @var KeywordRepository */
    protected $repo;

    public function __construct(KeywordRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $value
     * @return Keyword
     */
    public function createKeyword($value)
    {
        if(!$this->repo->isKeywordExists($value)) {
            try {
                return $this->repo->create($value);
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
        }
        throw new KeywordAlreadyExistsException();
    }

    /**
     * @param $id
     * @param $value
     * @return Keyword|null
     */
    public function editKeyword($id, $value)
    {
        try {
            $keyword =  $this->repo->edit($id, $value);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        /** @var Keyword $keyword */
        return $keyword;
    }

    /**
     * @param $id
     * @return null
     */
    public function deleteKeyword($id)
    {
        try {
            $this->repo->delete($id);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        return null;
    }

    /**
     * @return Keyword[]
     */
    public function getKeywordList()
    {

        return $this->repo->getKeywordList();

    }

    public function getOneKeywordById($id)
    {
        try {
            return $this->repo->getOneKeyword($id);
        }catch (DatabaseObjectExistsException $e) {
        } throw new NotFoundKeywordException();
    }
}