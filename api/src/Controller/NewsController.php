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
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Show news list",
     *         @Model(type=DTO\GetNewsListResponseBody::class)
     *     ),
     * )
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getNewsList(NewsService $service)
    {
        $newsList = $service->getNewsList();

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
        $news = $service->createNews($dto->getNewsAlias(), $dto->getNewsStatus());

        return $this->json((new DTO\CreateNewsResponseBody($news))->asArray());
    }


    /**
     * @Route("/news/:id", methods={"POST"})
     * @SWG\POST(
     *    tags={"News"},
     *    summary="Edit news from id",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request edit news from id",
     *         required=true,
     *         @Model(type=DTO\EditNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit news",
     *         @Model(type=DTO\EditNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function editNews(Request $request, NewsService $service)
    {
        /** @var DTO\EditNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditNewsRequestBody::class);
        $news = $service->editNews($dto->getId(), $dto->getNewsAlias(), $dto->getNewsStatus());

        return $this->json((new DTO\EditNewsResponseBody($news))->asArray());
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

        return $this->json($id, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/{id}", methods={"GET"})
     * @SWG\GET(
     *    tags={"News"},
     *    summary="Get news from id",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Update news",
     *         @Model(type=DTO\GetOneNewsByIdResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function getOneNews(Request $request, NewsService $service)
    {
            $news = $service->getoneNewsById($request->get('id'));


            return $this->json($news, Response::HTTP_OK);
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