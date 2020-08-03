<?php

namespace App\Controller;

use App\Controller\Dto\Request\NewsCategory as NewsCategoryRequest;
use App\Controller\Dto\Response\News as NewsResponse;
use App\Controller\Dto\Response\NewsCategory as NewsCategoryResponse;
use App\Services\NewsCategory\NewsCategoryService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class NewsCategoryController extends AbstractApiController
{
    /**
     * @Route("/news/category", methods={"PUT"})
     * @SWG\Put(
     *    tags={"News Categories"},
     *    summary="create new category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="create new category",
     *         required=true,
     *         @Model(type=NewsCategoryRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=NewsCategoryResponse::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function createNewsCategory(Request $request, NewsCategoryService $service)
    {
        /** @var NewsCategoryResponse $dto */
        $dto = $this->getDto($request, NewsCategoryRequest::class);
        $newsCategory = $service->createNewsCategory(
            $dto->getNewsCategoryParentId(),
            $dto->getNewsCategoryAlias());
        return $this->json((new NewsCategoryResponse($newsCategory))->asArray());
    }

    /**
     * @Route("/news/categories/{id}", methods={"POST"})
     * @SWG\Post(
     *    tags={"News Categories"},
     *    summary="edit category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="edit category",
     *         required=true,
     *         @Model(type=NewsCategoryRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="edit category",
     *         @Model(type=NewsCategoryResponse::class)
     *     ),
     * )
     * @param int $id
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function editNewsCategory(int $id, Request $request, NewsCategoryService $service)
    {
        /** @var NewsCategoryRequest $dto */
        $dto = $this->getDto($request, NewsCategoryRequest::class);
        $newsCategory = $service->editNewsCategoryById($id,
                                                        $dto->getNewsCategoryParentId(),
                                                        $dto->getNewsCategoryAlias());

        return $this->json((new NewsCategoryResponse($newsCategory))->asArray());
    }

    /**
     * @Route("/news/categories/{id}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"News Categories"},
     *    summary="delete category",
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="delete category",
     *     ),
     * )
     * @param int $id
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function deleteCategory(int $id, NewsCategoryService $service)
    {
        $service->deleteNewsCategory($id);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories", methods={"GET"})
     * @SWG\Get(
     *    tags={"News Categories"},
     *    summary="get category list",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=NewsCategoryResponse::class)
     *     ),
     * )
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getCategoryList(NewsCategoryService $service)
    {
        $newsCategories = $service->getNewsCategoryList();
        $newsCategoryList = [];

        foreach ($newsCategories as $newsCategory){
            $newsCategoryList[] = (new NewsCategoryResponse($newsCategory))->asArray();
        }
        return $this->json($newsCategoryList, Response::HTTP_OK);
    }

    /**
     * @Route("/news/categories/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"News Categories"},
     *    summary="get one category by id",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=NewsCategoryResponse::class)
     *     ),
     * )
     * @param int $id
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getOneCategory(int $id, NewsCategoryService $service)
    {
        $newsCategory = $service->getOneNewsCategoryById($id);

        return $this->json((new NewsCategoryResponse($newsCategory))->asArray());
    }

    /**
     * @Route("/news/categories/{category}/news/{news}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"News"},
     *    summary="bind news to category (news-to-news-category)",
     *     @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="bind news to category",
     *     ),
     * )
     * @param int $category
     * @param int $news
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function bindNewsToNewsCategory(int $category, int $news, NewsCategoryService $service)
    {
        $service->bindNewsToCategory($category, $news);

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
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function unbindNewsToNewsCategory(int $category, int $news, NewsCategoryService $service)
    {
        $service->unbindNewsToCategory($category, $news);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories/{id}/news/", methods={"GET"})
     * @SWG\Get(
     *    tags={"News Categories"},
     *    summary="Get news list to category (news-to-news-category)",
     *     @SWG\Response(
     *         response=200,
     *         description="Get news list to category",
     *         @Model(type=NewsResponse::class)
     *     ),
     * )
     * @param int $id
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getNewsListToNewsCategory(int $id, NewsCategoryService $service)
    {
        $category = $service->getOneNewsCategoryById($id);
        $newsList = [];

        foreach($category->getNews() as $news){
            $newsList[] = (new NewsResponse($news))->asArray();
        }
        return $this->json($newsList, Response::HTTP_OK);
    }


}
