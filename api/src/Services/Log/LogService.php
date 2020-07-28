<?php


namespace App\Services\Log;

use App\Entity\Log;
use App\Exceptions\Log\LogAlreadyExistsException;
use App\Exceptions\Log\NotFoundLogException;
use App\Repository\LogRepository;
use Doctrine\DBAL\Exception\DatabaseObjectExistsException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class LogService
{
    /** @var LogRepository */
    protected $repo;

    public function __construct(LogRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $value
     * @return Log
     */
    public function createLog($value)
    {
        if(!$this->repo->isLogExists($value)) {
            try {
                return $this->repo->create($value);
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
        }
        throw new LogAlreadyExistsException();
    }

    /**
     * @return Log[]
     */
    public function getLogList()
    {
        return $this->repo->getLogList();
    }


    public function getOneLogById($id)
    {
        try {
            return $this->repo->getLog($id);
        }catch (DatabaseObjectExistsException $e) {
        } throw new NotFoundLogException();
    }
}