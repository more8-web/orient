<?php


namespace App\Controller;

use App\Controller\Dto\News as DTO;
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
     * @Route("/news", methods={"GET"})
     * @SWG\Get(
     *    tags={"News"},
     *    summary="Get news list",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Show news list request",
     *         required=true,
     *         @Model(type=DTO\ShowNewsListRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Show news list",
     *         @Model(type=DTO\ShowNewsListResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function showNewsList(Request $request, NewsService $service)
    {
        /** @var DTO\ShowNewsListRequestBody $dto */
        $dto = $this->getDto($request, DTO\ShowNewsListRequestBody::class);
        $newsList = $service->getNewsList($dto->getFilter());

        return $this->json($newsList, Response::HTTP_OK);
    }

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
     *         @Model(type=DTO\CreateNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Show news list",
     *         @Model(type=DTO\CreateNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function createNewArticle(Request $request, NewsService $service)
    {
        /** @var DTO\CreateNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateNewsRequestBody::class);
        $newsList = $service->getNewsList($dto->getParameters());

        return $this->json($newsList, Response::HTTP_OK);
    }


    /**
     * @Route("/news/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"News"},
     *    summary="Delete news from id",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request delete news from id",
     *         required=true,
     *         @Model(type=DTO\DeleteNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Delete news",
     *         @Model(type=DTO\DeleteNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function deleteNews(Request $request, NewsService $service)
    {
        /** @var DTO\DeleteNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\DeleteNewsRequestBody::class);


        return $this->json($dto, Response::HTTP_OK);
    }

    /**
     * @Route("/news/:id", methods={"POST"})
     * @SWG\POST(
     *    tags={"News"},
     *    summary="Update news from id",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request update news from id",
     *         required=true,
     *         @Model(type=DTO\UpdateNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Update news",
     *         @Model(type=DTO\UpdateNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function updateNews(Request $request, NewsService $service)
    {
        /** @var DTO\UpdateNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\UpdateNewsRequestBody::class);


        return $this->json($dto, Response::HTTP_OK);
    }

    /**
     * @Route("/news/:id", methods={"GET"})
     * @SWG\GET(
     *    tags={"News"},
     *    summary="Get news from id",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request get news from id",
     *         required=true,
     *         @Model(type=DTO\GetOneNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Update news",
     *         @Model(type=DTO\GetOneNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getOneNews(Request $request, NewsService $service)
    {
        /** @var DTO\GetOneNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetOneNewsRequestBody::class);


        return $this->json($dto, Response::HTTP_OK);
    }

    /**
     * @Route("/news/categories/:id/news/:id", methods={"PUT"})
     * @SWG\Put(
     *    tags={"News"},
     *    summary="bind news to category (news-to-news-category)",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="bind news to category (news-to-news-category)",
     *         required=true,
     *         @Model(type=DTO\BindNewsToCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Update news",
     *         @Model(type=DTO\BindNewsToCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function bindNewsToCategory(Request $request, NewsService $service)
    {
        /** @var DTO\GetOneNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetOneNewsRequestBody::class);


        return $this->json($dto, Response::HTTP_OK);
    }

    /**
     * @Route("/news/categories/:id/news/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"News"},
     *    summary="unbind news to category (news-to-news-category)",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="unbind news to category (news-to-news-category)",
     *         required=true,
     *         @Model(type=DTO\UnbindNewsToCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Update news",
     *         @Model(type=DTO\UnbindNewsToCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function unbindNewsToCategory(Request $request, NewsService $service)
    {
        /** @var DTO\UnbindNewsToCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\UnbindNewsToCategoryRequestBody::class);


        return $this->json($dto, Response::HTTP_OK);
    }

    /**
     * @Route("/news/:id/log", methods={"PUT"})
     * @SWG\Put(
     *    tags={"News"},
     *    summary="new log record to news",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="new log record to news",
     *         required=true,
     *         @Model(type=DTO\CreateNewLogRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="new log record to news",
     *         @Model(type=DTO\CreateNewLogResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function createNewLog(Request $request, NewsService $service)
    {
        /** @var DTO\CreateNewLogRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateNewLogRequestBody::class);


        return $this->json($dto, Response::HTTP_OK);
    }

    /**
     * @Route("/news/:id/log", methods={"GET"})
     * @SWG\Get(
     *    tags={"News"},
     *    summary="get log of news",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="get log of news",
     *         required=true,
     *         @Model(type=DTO\GetNewsLogRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="get log of news",
     *         @Model(type=DTO\GetNewsLogResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getNewsLog(Request $request, NewsService $service)
    {
        /** @var DTO\GetNewsLogRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetNewsLogRequestBody::class);


        return $this->json($dto, Response::HTTP_OK);
    }
}