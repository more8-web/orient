<?php

namespace App\Controller;

use App\Controller\Dto\Request\Keyword as KeywordRequest;
use App\Controller\Dto\Response\Keyword as KeywordResponse;
use App\Services\Keyword\KeywordService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class KeywordController extends AbstractApiController
{
    /**
     * @Route("/keyword", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Keywords"},
     *    summary="Create new keyword",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Create new keyword",
     *         required=true,
     *         @Model(type=KeywordRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new keyword",
     *         @Model(type=KeywordResponse::class)
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function createKeyword(Request $request, KeywordService $service)
    {
        /** @var KeywordRequest $dto */
        $dto = $this->getDto($request, KeywordRequest::class);
        $keyword = $service->createKeyword($dto->getKeywordValue());

        return $this->json((new KeywordResponse($keyword))->asArray());
    }

    /**
     * @Route("/keyword/{id}", methods={"POST"})
     * @SWG\Post(
     *    tags={"Keywords"},
     *    summary="Edit keyword",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Edit keyword",
     *         required=true,
     *         @Model(type=KeywordRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit keyword",
     *         @Model(type=KeywordResponse::class)
     *     ),
     * )
     * @param int $id
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function editKeyword(int $id, Request $request, KeywordService $service)
    {
        /** @var KeywordRequest $dto */
        $dto = $this->getDto($request, KeywordRequest::class);
        $keyword = $service->editKeyword($id, $dto->getKeywordValue());

        return $this->json((new KeywordResponse($keyword))->asArray());
    }

    /**
     * @Route("/keywords/{id}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Keywords"},
     *    summary="Delete keyword",
     *     @SWG\Response(
     *         response=204,
     *         description="Delete keyword success",
     *     ),
     * )
     * @param int $id
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function deleteKeyword(int $id, KeywordService $service)
    {
        $service->deleteKeyword($id);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/keywords", methods={"GET"})
     * @SWG\Get(
     *    tags={"Keywords"},
     *    summary="Get keywords list",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get keywords list",
     *         @Model(type=KeywordResponse::class)
     *     ),
     * )
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function getKeywordList(KeywordService $service)
    {
        $keywords = $service->getKeywordList();
        $keywordList = [];

        foreach ($keywords as $keyword){
            $keywordList[] = (new KeywordResponse($keyword))->asArray();
        }

        return $this->json($keywordList, Response::HTTP_OK);
    }

    /**
     * @Route("/keywords/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"Keywords"},
     *    summary="Get one keyword by id",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get one keyword by id",
     *         @Model(type=KeywordResponse::class)
     *     ),
     * )
     * @param int $id
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function getOneKeywordById(int $id, KeywordService $service)
    {
        $keyword = $service->getOneKeywordById($id);

        return $this->json((new KeywordResponse($keyword))->asArray());
    }

    /**
     * @Route("/keywords/{keyword}/news/{news}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Keywords"},
     *    summary="Bind keyword to news (news-to-keyword)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Get one keyword by id",
     *     ),
     * )
     * @param $keyword
     * @param $news
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function bindKeywordToNews($keyword, $news, KeywordService $service)
    {
        $service->bindKeywordToNews($keyword, $news);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/keywords/{keyword}/news/{news}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Keywords"},
     *    summary="Unbind keywords by id to news by id",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind keywords by id to news by id",
     *     ),
     * )
     * @param int $keyword
     * @param int $news
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function unbindKeywordToNews(int $keyword, int $news, KeywordService $service)
    {
        $service->unbindKeywordToNews($keyword, $news);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/keywords/{keyword}/contents/{content}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Keywords"},
     *    summary="Bind keyword by id to content by id (keywords-to-content)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Bind keyword by id to content by id (keywords-to-content)",
     *     ),
     * )
     * @param $keyword
     * @param $content
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function bindKeywordToContent($keyword, $content, KeywordService $service)
    {
        $service->bindKeywordToContent($keyword, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/keywords/{keyword}/contents/{content}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Keywords"},
     *    summary="Unbind keyword from content by id",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind keyword from content by id",
     *     ),
     * )
     * @param $keyword
     * @param $content
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function unbindKeywordToContent($keyword, $content, KeywordService $service)
    {
        $service->unbindKeywordToContent($keyword, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

}
