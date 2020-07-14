<?php

namespace App\Controller;

use App\Controller\Dto\NewsCategory as DTO;
use App\Services\NewsCategory\NewsCategoryService;
use Exception;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class NewsCategoryController extends AbstractApiController
{
    /**
     * @Route("/news/categories", methods={"GET"})
     * @SWG\Get(
     *    tags={"Categories"},
     *    summary="get category list",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Get category list",
     *         required=true,
     *         @Model(type=DTO\GetCategoryListRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=DTO\GetCategoryListResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getCategoryList(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\GetCategoryListRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetCategoryListRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories/:id", methods={"GET"})
     * @SWG\Get(
     *    tags={"Categories"},
     *    summary="get one category by id",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="get one category by id",
     *         required=true,
     *         @Model(type=DTO\GetOneCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=DTO\GetOneCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getOneCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\GetOneCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetOneCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories/:id/news", methods={"GET"})
     * @SWG\Get(
     *    tags={"Categories"},
     *    summary="get news of category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="get news of category",
     *         required=true,
     *         @Model(type=DTO\GetNewsOfCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=DTO\GetNewsOfCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getNewsOfCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\GetNewsOfCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetNewsOfCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/category", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Categories"},
     *    summary="create new category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="create new category",
     *         required=true,
     *         @Model(type=DTO\CreateNewCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=DTO\CreateNewCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function createNewCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\CreateNewCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateNewCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories/:id", methods={"POST"})
     * @SWG\Post(
     *    tags={"Categories"},
     *    summary="edit category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="edit category",
     *         required=true,
     *         @Model(type=DTO\EditCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="edit category",
     *         @Model(type=DTO\EditCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function editCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\EditCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/categories/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Categories"},
     *    summary="delete category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="delete category",
     *         required=true,
     *         @Model(type=DTO\DeleteCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="edit category",
     *         @Model(type=DTO\DeleteCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function deleteCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\DeleteCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\DeleteCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
