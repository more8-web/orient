<?php


namespace App\Controller;

use App\Controller\Dto\Request\News as NewsRequest;
use App\Controller\Dto\Response\Content as ContentResponse;
use App\Controller\Dto\Response\Keyword as KeywordResponse;
use App\Controller\Dto\Response\News as NewsResponse;
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
     * )
     * @SWG\Response(
     *    response=200,
     *    description="Show news list",
     *    @SWG\Schema(
     *        type="array",
     *        @Model(type=NewsResponse::class),
     *    )
     * )
     *
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getList(NewsService $service)
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
     *    summary="Get news by id",
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
    public function getNewsById(int $id, NewsService $service)
    {
            $news = $service->getNewsById($id);

            return $this->json((new NewsResponse($news))->asArray());
    }

    /**
     * @Route("/news/{news}/content/{content}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"News"},
     *    summary="Bind content to news (content-to-news)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Bind content to news (content-to-news)",
     *     ),
     * )
     * @param int $content
     * @param int $news
     * @param NewsService $service
     * @return JsonResponse
     */
    public function bindContentToNews(int $news, int $content, NewsService $service)
    {
        $service->bindContentToNews($news, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/{news}/content/{content}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"News"},
     *    summary="Unbind content to news (content-to-news)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind content to news (content-to-news)",
     *     ),
     * )
     * @param int $content
     * @param int $news
     * @param NewsService $service
     * @return JsonResponse
     */
    public function unbindContentToNews(int $news, int $content, NewsService $service)
    {
        $service->unbindContentToNews($news, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/{id}/contents", methods={"GET"})
     * @SWG\Get(
     *    tags={"News"},
     *    summary="Get all content of news",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get all content of news",
     *         @Model(type=ContentResponse::class)
     *     ),
     * )
     * @param int $id
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getContentListByNews(int $id, NewsService $service)
    {
        $news = $service->getNewsById($id);
        $contents = [];
        foreach($news->getContents() as $content) {
            $contents[] = (new ContentResponse($content))->asArray();
        }
        return $this->json($contents, Response::HTTP_OK);
    }

    /**
     * @Route("/news/{id}/keywords", methods={"GET"})
     * @SWG\Get(
     *    tags={"News"},
     *    summary="Get all keywords by news",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get all keywords by news",
     *         @Model(type=KeywordResponse::class)
     *     ),
     * )
     * @param int $id
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getKeywordsByNews(int $id, NewsService $service)
    {
        $news = $service->getNewsById($id);
        $keywords = [];

        foreach ($news->getKeywords() as $keyword) {
            $keywords[] = (new KeywordResponse($keyword))->asArray();
        }
        return $this->json($keywords, Response::HTTP_OK);
    }
}