<?php

namespace App\Controller;

use App\Controller\Dto\Keyword as DTO;
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
     *         @Model(type=DTO\CreateNewKeywordRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new keyword",
     *         @Model(type=DTO\CreateNewKeywordResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function createNewKeywordCategory(Request $request, KeywordService $service)
    {
        /** @var DTO\CreateNewKeywordRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateNewKeywordRequestBody::class);
        $keyword = $service->createKeyword($dto->getKeywordValue());

        return $this->json((new DTO\CreateNewKeywordResponseBody($keyword))->asArray());
    }

    /**
     * @Route("/keyword/:id", methods={"POST"})
     * @SWG\Post(
     *    tags={"Keywords"},
     *    summary="Edit keyword",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Edit keyword",
     *         required=true,
     *         @Model(type=DTO\EditKeywordRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit keyword",
     *         @Model(type=DTO\EditKeywordResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function editKeyword(Request $request, KeywordService $service)
    {
        /** @var DTO\EditKeywordRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditKeywordRequestBody::class);
        $keyword = $service->editKeyword($dto->getId(), $dto->getKeywordValue());

        return $this->json((new DTO\EditKeywordResponseBody($keyword))->asArray());
    }

    /**
     * @Route("/keywords/:id", methods={"DELETE"})
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
     *     @SWG\Response(
     *         response=200,
     *         description="Get keywords list",
     *         @Model(type=DTO\GetKeywordsListResponseBody::class)
     *     ),
     * )
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function getKeywordsList(KeywordService $service)
    {
        $keywordList = $service->getKeywordList();
        return $this->json($keywordList, Response::HTTP_OK);
    }

    /**
     * @Route("/keywords/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"Keywords"},
     *    summary="Get one keyword by id",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get one keyword by id",
     *         @Model(type=DTO\GetOneKeywordByIdResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function getOneKeywordById(Request $request, KeywordService $service)
    {
        $keyword = $service->getOneKeywordById($request->get('id'));

        return $this->json((new DTO\GetOneKeywordByIdResponseBody($keyword))->asArray());
    }

    /**
     * @Route("/keywords/:id/news/:id", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Keywords"},
     *    summary="Bind keyword to news (news-to-keyword)",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get one keyword by id",
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function bindKeywordToNews(Request $request, KeywordService $service)
    {

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/keywords/:id/news/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Keywords"},
     *    summary="Unbind keywords by id from news by id",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Unbind keywords by id from news by id",
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function deleteKeywordFromNews(Request $request, KeywordService $service)
    {

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/keywords/:id/contents/:id", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Keywords"},
     *    summary="Bind keyword by id to content by id (keywords-to-content)",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Bind keyword by id to content by id (keywords-to-content)",
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function bindKeywordToContent(Request $request, KeywordService $service)
    {

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/keywords/:id/contents/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Keywords"},
     *    summary="Unbind keyword from content by id",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Delete keyword from content by id",
     *     ),
     * )
     * @param Request $request
     * @param KeywordService $service
     * @return JsonResponse
     */
    public function deleteKeywordFromContentById(Request $request, KeywordService $service)
    {

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
