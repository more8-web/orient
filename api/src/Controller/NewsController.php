<?php


namespace App\Controller;

use App\Controller\Dto\Request\News as NewsRequest;
use App\Controller\Dto\Response\News as NewsResponse;
use App\Services\Content\ContentService;
use App\Services\News\NewsService;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;


class NewsController extends AbstractApiController
{
    /**
     * @Route("/news", methods={"PUT"})
     * @SWG\Put(
     *    tags={"News"},
     *    summary="Create new news",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request create news ",
     *         required=true,
     *         @Model(type=NewsRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Show news list",
     *         @Model(type=NewsResponse::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function createNews(Request $request, NewsService $service)
    {
        /** @var NewsRequest $dto */
        $dto = $this->getDto($request, NewsRequest::class);
        $news = $service->createNews($dto->getNewsAlias(), $dto->getNewsStatus());

        return $this->json((new NewsResponse($news))->asArray());
    }

    /**
     * @Route("/news/{id}", methods={"POST"})
     * @SWG\POST(
     *    tags={"News"},
     *    summary="Edit news from id",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request edit news from id",
     *         required=true,
     *         @Model(type=NewsRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit news",
     *         @Model(type=NewsResponse::class)
     *     ),
     * )
     * @param int $id
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function editNews(int $id, Request $request, NewsService $service)
    {
        /** @var NewsRequest $dto */
        $dto = $this->getDto($request, NewsRequest::class);
        $news = $service->editNews($id, $dto->getNewsAlias(), $dto->getNewsStatus());

        return $this->json((new NewsResponse($news))->asArray());
    }

    /**
     * @Route("/news/{id}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"News"},
     *    summary="Delete news by id",
     *    @SWG\Response(
     *        response=204,
     *        description="Success delete news",
     *    ),
     * )
     * @param int $id
     * @param NewsService $service
     * @return JsonResponse
     */
    public function deleteNews(int $id, NewsService $service)
    {
        $service->deleteNews($id);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news", methods={"GET"})
     * @SWG\Get(
     *    tags={"News"},
     *    summary="Get news list",
     *     ),
     *     @SWG\Response(
     *          response=200,
     *          @SWG\Schema(
     *             type="array",
     *             @Model(type=NewsResponse::class)
     *          ),
     *          description="Show news list",
     *     ),
     * )
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getNewsList(NewsService $service)
    {
        $listNews = $service->getNewsList();
        $listResponse = [];

        foreach ($listNews as $news) {
            $listResponse[] = (new NewsResponse($news))->asArray();
        }

        return $this->json($listResponse, Response::HTTP_OK);
    }

    /**
     * @Route("/news/{id}", methods={"GET"})
     * @SWG\GET(
     *    tags={"News"},
     *    summary="Get news from id",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get one news",
     *         @Model(type=NewsResponse::class)
     *     ),
     * )
     * @param int $id
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getOneNews(int $id, NewsService $service)
    {
            $news = $service->getNewsById($id);

            return $this->json($news, Response::HTTP_OK);
    }

    /**
     * @Route("/news/{id}/contents", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get all content of news",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get all content of news",
     *         @Model(type=ContentResponse::class)
     *     ),
     * )
     * @param int $id
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getAllContentOfNews(int $id, ContentService $service)
    {
        $contentList = $service->getContentListByNews($id);

        return $this->json($contentList, Response::HTTP_OK);
    }

    /**
     * @Route("/news/{newsId}/content/{contentId}", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get one content by news",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get one content by news",
     *         @Model(type=DTO\GetContentByNewsResponseBody::class)
     *     ),
     * )
     * @param int $newsId
     * @param int $contentId
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getOneContentOfNews(int $newsId, int $contentId, ContentService $service)
    {
        $content = $service->getContentByNews($newsId, $contentId);
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories/{category}/news/{news}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"News"},
     *    summary="bind news to category (news-to-news-category)",
     *     @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Update news",
     *     ),
     * )
     * @param int $category
     * @param int $news
     * @param NewsService $service
     * @return JsonResponse
     */
    public function bindNewsToCategory(int $category, int $news, NewsService $service)
    {
        $service->bindNewsToCategory($news, $category);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories/{category}/news/{news}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"News"},
     *    summary="unbind news to category (news-to-news-category)",
     *     @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind news to category",
     *     ),
     * )
     * @param int $category
     * @param int $news
     * @param NewsService $service
     * @return JsonResponse
     */
    public function unbindNewsToCategory(int $category, int $news, NewsService $service)
    {
        $service->unbindNewsToCategory($news, $category);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}