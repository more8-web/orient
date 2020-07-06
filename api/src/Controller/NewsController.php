<?php


namespace App\Controller;

use App\Controller\Dto\NewsDto as DTO;
use App\Services\News\NewsService;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Exception;
use Nelmio\ApiDocBundle\Annotation\Model;


class NewsController extends AbstractApiController
{
    /**
     * @Route("/news", methods={"GET"})
     * @SWG\Post(
     *    tags={"News"},
     *    summary="Get news list",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request news list",
     *         required=true,
     *         @Model(type=DTO\NewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Show news list",
     *         @Model(type=DTO\NewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsService $service
     * @return JsonResponse
     */
    public function showNewsList(Request $request, NewsService $service)
    {
        /** @var DTO\NewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\NewsRequestBody::class);
        $newsList = $service->getNewsList($dto->getToken());

        return $this->json($newsList, Response::HTTP_OK);
    }

//    /**
//     * @Route("/news", methods={"PUT"})
//     * @SWG\Post(
//     *    tags={"News"},
//     *    summary="Create new news",
//     *     @SWG\Parameter(
//     *         name="body",
//     *         in="body",
//     *         description="Request create news ",
//     *         required=true,
//     *         @Model(type=DTO\CreateNewsRequestBody::class)
//     *     ),
//     *     @SWG\Response(
//     *         response=200,
//     *         description="Show news list",
//     *         @Model(type=DTO\CreateNewsResponseBody::class)
//     *     ),
//     * )
//     * @param Request $request
//     * @param NewsService $service
//     * @return JsonResponse
//     */
//    public function createNewArticle(Request $request, NewsService $service)
//    {
//        /** @var DTO\NewsRequestBody $dto */
//        $dto = $this->getDto($request, DTO\NewsRequestBody::class);
//        $newsList = $service->getNewsList($dto->getToken());
//
//        return $this->json($newsList, Response::HTTP_OK);
//    }
}