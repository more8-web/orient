<?php


namespace App\Services\HtmlTag;


use App\Entity\HtmlTag;
use App\Exceptions\HtmlTags\HtmlTagAlreadyExistsException;
use App\Exceptions\HtmlTags\NotFoundHtmlTagException;
use App\Repository\ContentRepository;
use App\Repository\HtmlTagRepository;
use Doctrine\DBAL\Exception\DatabaseObjectExistsException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class HtmlTagService
{
    /** @var HtmlTagRepository */
    protected $repo;

    /**
     * @var ContentRepository
     */
    protected $contentRepo;

    public function __construct(HtmlTagRepository $repo, ContentRepository $contentRepository)
    {
        $this->repo = $repo;
        $this->contentRepo = $contentRepository;
    }

    /**
     * @param $value
     * @return HtmlTag
     */
    public function createHtmlTag($value)
    {
        if(!$this->repo->isHtmlTagExists($value)) {
            try {
                return $this->repo->create($value);
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
        }
        throw new HtmlTagAlreadyExistsException();
    }

    /**
     * @param $id
     * @param $value
     * @return HtmlTag
     */
    public function editHtmTag($id, $value)
    {
        try {
            $htmlTag =  $this->repo->edit($id, $value);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        /** @var HtmlTag $htmlTag */
        return $htmlTag;
    }

    /**
     * @param $id
     * @return null
     */
    public function deleteHtmlTag($id)
    {
        try {
            $this->repo->delete($id);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        return null;
    }

    /**
     * @return HtmlTag[]
     */
    public function getHtmlTagList()
    {

        return $this->repo->getHtmlTagList();

    }

    /**
     * @param $id
     * @return HtmlTag|null
     */
    public function getHtmlTagById($id)
    {
        try {
            return $this->repo->getHtmlTag($id);
        }catch (DatabaseObjectExistsException $e) {
        } throw new NotFoundHtmlTagException();
    }

    /**
     * @param $tagId
     * @param $contentId
     */
    public function bindHtmlTagToContent($tagId, $contentId)
    {
        $this->repo->bindToContent(
            $tagId,
            $this->contentRepo->find($contentId)
        );
    }

    /**
     * @param $tagId
     * @param $contentId
     */
    public function unbindHtmlTagToContent($tagId, $contentId)
    {
        $this->repo->unbindToCategory(
            $tagId,
            $this->contentRepo->find($contentId)
        );
    }

}