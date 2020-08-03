<?php


namespace App\Services\Keyword;


use App\Entity\Keyword;
use App\Exceptions\Keyword\KeywordAlreadyExistsException;
use App\Exceptions\Keyword\NotFoundKeywordException;
use App\Repository\ContentRepository;
use App\Repository\KeywordRepository;
use App\Repository\NewsRepository;
use Doctrine\DBAL\Exception\DatabaseObjectExistsException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class KeywordService
{
    /** @var KeywordRepository */
    protected $repo;

    /**
     * @var NewsRepository
     */
    protected $newsRepo;

    /**
     * @var ContentRepository
     */
    protected $contentRepo;

    /**
     * KeywordService constructor.
     * @param KeywordRepository $repo
     * @param NewsRepository $newsRepository
     * @param ContentRepository $contentRepository
     */
    public function __construct(KeywordRepository $repo, NewsRepository $newsRepository, ContentRepository $contentRepository)
    {
        $this->repo = $repo;
        $this->newsRepo = $newsRepository;
        $this->contentRepo = $contentRepository;
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

    /**
     * @param $id
     * @return Keyword|null
     */
    public function getOneKeywordById($id)
    {
        try {
            return $this->repo->getOneKeyword($id);
        }catch (DatabaseObjectExistsException $e) {
        } throw new NotFoundKeywordException();
    }

    /**
     * @param $keywordId
     * @param $newsId
     */
    public function bindKeywordToNews($keywordId, $newsId)
    {
        $this->repo->bindToNews($keywordId, $this->newsRepo->find($newsId));
    }

    /**
     * @param $keywordId
     * @param $newsId
     */
    public function unbindKeywordToNews($keywordId, $newsId)
    {
        $this->repo->unbindKeywordToNews($keywordId, $this->newsRepo->find($newsId));
    }

    /**
     * @param $id
     * @return Keyword[]
     */
    public function getKeywordListByNews($id)
    {
        return $this->repo->getKeywordListByNews($id);
    }

    /**
     * @param $keyword
     * @param $news
     * @return Keyword|null
     */
    public function getOneKeywordByNews($keyword, $news)
    {
        return $this->repo->getKeywordByNews($keyword, $news);
    }

    /**
     * @param $keywordId
     * @param $contentId
     */
    public function bindKeywordToContent($keywordId, $contentId)
    {
        $this->repo->bindToContent($keywordId, $this->contentRepo->find($contentId));
    }

    /**
     * @param $keywordId
     * @param $contentId
     */
    public function unbindKeywordToContent($keywordId, $contentId)
    {
        $this->repo->unbindToContent($keywordId, $this->contentRepo->find($contentId));
    }

    /**
     * @param $id
     * @return Keyword[]
     */
    public function getKeywordListByContent($id)
    {
        return $this->repo->getKeywordListByNews($id);
    }

    /**
     * @param $keyword
     * @param $news
     * @return Keyword|null
     */
    public function getOneKeywordByContent($keyword, $news)
    {
        return $this->repo->getKeywordByNews($keyword, $news);
    }
}