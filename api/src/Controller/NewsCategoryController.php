<?php

namespace App\Controller;

use App\Controller\Dto\NewsCategory as DTO;
use App\Services\NewsCategory\NewsCategoryService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use App\Controller\Dto\Response\NewsCategoryResponse;

class NewsCategoryController extends AbstractApiController
{
    /**
     * @Route("/news/categories", methods={"GET"})
     * @SWG\Get(
     *    tags={"News Categories"},
     *    summary="get category list",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=DTO\GetNewsCategoryListResponseBody::class)
     *     ),
     * )
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getCategoryList(NewsCategoryService $service)
    {
        $newsCategoryList = $service->getNewsCategoryList();
        return $this->json($newsCategoryList, Response::HTTP_OK);
    }

    /**
     * @Route("/news/categories/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"News Categories"},
     *    summary="get one category by id",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=DTO\GetOneNewsCategoryByIdResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getOneCategory(Request $request, NewsCategoryService $service)
    {
        $newsCategory = $service->getOneNewsCategoryById($request->get('id'));

        return $this->json((new DTO\GetOneNewsCategoryByIdResponseBody($newsCategory))->asArray());
    }

    /**
     * @Route("/news/categories/:id/news", methods={"GET"})
     * @SWG\Get(
     *    tags={"News Categories"},
     *    summary="get news of category",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=NewsCategoryResponse::class)
     *     ),
     * )
     * @param int $newsCategoryId
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function getNewsOfCategory(int $newsCategoryId, NewsCategoryService $service)
    {
        $service->getOneNewsCategoryById($newsCategoryId);

        return $this->json(null, Response::HTTP_OK);
    }

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
     *         @Model(type=DTO\CreateNewsCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get category list",
     *         @Model(type=DTO\CreateNewsCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function createNewsCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\CreateNewsCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateNewsCategoryRequestBody::class);
        $newsCategory = $service->createNewsCategory(
                                                        $dto->getNewsCategoryParentId(),
                                                        $dto->getNewsCategoryAlias());

        return $this->json((new DTO\CreateNewsCategoryResponseBody($newsCategory))->asArray());
    }

    /**
     * @Route("/news/categories/:id", methods={"POST"})
     * @SWG\Post(
     *    tags={"News Categories"},
     *    summary="edit category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="edit category",
     *         required=true,
     *         @Model(type=DTO\EditNewsCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="edit category",
     *         @Model(type=DTO\EditNewsCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function editNewsCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\EditNewsCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditNewsCategoryRequestBody::class);
        $newsCategory = $service->editNewsCategoryById(
                                                        $dto->getId(),
                                                        $dto->getNewsCategoryParentId(),
                                                        $dto->getNewsCategoryAlias());

        return $this->json((new DTO\EditNewsCategoryResponseBody($newsCategory))->asArray());
    }

    /**
     * @Route("/news/categories/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"News Categories"},
     *    summary="delete category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="delete category",
     *         required=true,
     *         @Model(type=DTO\DeleteNewsCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="edit category",
     *     ),
     * )
     * @param Request $request
     * @param NewsCategoryService $service
     * @return JsonResponse
     */
    public function deleteCategory(Request $request, NewsCategoryService $service)
    {
        /** @var DTO\DeleteNewsCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\DeleteNewsCategoryRequestBody::class);
        $service->deleteNewsCategory($dto->getId());

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
