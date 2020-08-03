<?php

namespace App\Controller;

use App\Controller\Dto\Request\Content as ContentRequest;
use App\Controller\Dto\Response\Content as ContentResponse;
use App\Controller\Dto\Response\Keyword as KeywordResponse;
use App\Controller\Dto\Response\News as NewsResponse;
use App\Services\Content\ContentService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class ContentController extends AbstractApiController
{
    /**
     * @Route("/content", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Create new content",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Create new content",
     *         required=true,
     *         @Model(type=ContentRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new content",
     *         @Model(type=ContentResponse::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function createNewContent(Request $request, ContentService $service)
    {
        /** @var ContentRequest $dto */
        $dto = $this->getDto($request, ContentRequest::class);
        $content = $service->createNewContent(  $dto->getContentAlias(),
                                                $dto->getContentDescription(),
                                                $dto->getContentValue());

        return $this->json((new ContentResponse($content))->asArray());
    }

    /**
     * @Route("/contents/{id}", methods={"POST"})
     * @SWG\Post(
     *    tags={"Content"},
     *    summary="Edit content",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Edit content",
     *         required=true,
     *         @Model(type=ContentRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit content",
     *         @Model(type=ContentResponse::class)
     *     ),
     * )
     * @param int $id
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function editContent(int $id, Request $request, ContentService $service)
    {
        /** @var ContentRequest $dto */
        $dto = $this->getDto($request, ContentRequest::class);
        $content = $service->editContent($id,   $dto->getContentAlias(),
                                                $dto->getContentDescription(),
                                                $dto->getContentValue());

        return $this->json((new ContentResponse($content))->asArray());
    }

    /**
     * @Route("/contents/{id}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Content"},
     *    summary="Delete content",
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="Delete content",
     *     ),
     * )
     * @param int $id
     * @param ContentService $service
     * @return JsonResponse
     */
    public function deleteContent(int $id, ContentService $service)
    {
        $service->deleteContent($id);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/contents/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get one content by id",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get one content by id",
     *         @Model(type=ContentResponse::class)
     *     ),
     * )
     * @param int $id
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getOneContent(int $id, ContentService $service)
    {

        $content = $service->getOneContentById($id);

        return $this->json((new ContentResponse($content))->asArray());
    }

    /**
     * @Route("/contents", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get content list",
     *     ),
     * @SWG\Response(
     *          response=200,
     *          @SWG\Schema(
     *             type="array",
     *             @Model(type=NewsResponse::class)
     *          ),
     *          description="Show news list",
     *     ),
     * )
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getContentList(ContentService $service)
    {
        $contentList = $service->getContentList();
        $listResponse = [];

        foreach ($contentList as $content) {
            $listResponse[] = (new ContentResponse($content))->asArray();
        }

        return $this->json($listResponse, Response::HTTP_OK);
    }

    /**
     * @Route("/content/{id}/keywords", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get all keywords by content",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get all keywords by content",
     *         @Model(type=KeywordResponse::class)
     *     ),
     * )
     * @param int $id
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getKeywordsByContent(int $id, ContentService $service)
    {
        $content = $service->getOneContentById($id);
        $keywords = [];

        foreach ($content->getKeywords() as $keyword) {
            $keywords[] = (new KeywordResponse($keyword))->asArray();
        }
        return $this->json($keywords, Response::HTTP_OK);
    }
}
