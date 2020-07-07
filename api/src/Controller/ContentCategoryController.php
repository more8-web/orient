<?php

namespace App\Controller;

use App\Controller\Dto\ContentCategory as DTO;
use App\Services\Content\ContentService;
use Exception;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class ContentCategoryController extends AbstractApiController
{
    /**
     * @Route("/content/category", methods={"PUT"})
     * @SWG\Put(
     *    tags={"ContentCategory"},
     *    summary="Create new content category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Create new content category",
     *         required=true,
     *         @Model(type=DTO\CreateNewContentCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new content category",
     *         @Model(type=DTO\CreateNewContentCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function createNewContentCategory(Request $request, ContentService $service)
    {
        /** @var DTO\CreateNewContentCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateNewContentCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories/:id", methods={"POST"})
     * @SWG\Post(
     *    tags={"ContentCategory"},
     *    summary="Edit content category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Edit content category",
     *         required=true,
     *         @Model(type=DTO\EditContentCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit content category",
     *         @Model(type=DTO\EditContentCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function editContentCategory(Request $request, ContentService $service)
    {
        /** @var DTO\EditContentCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditContentCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"ContentCategory"},
     *    summary="Delete content category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Delete content category",
     *         required=true,
     *         @Model(type=DTO\DeleteContentCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Delete content category",
     *         @Model(type=DTO\DeleteContentCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function deleteContentCategory(Request $request, ContentService $service)
    {
        /** @var DTO\DeleteContentCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\DeleteContentCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories", methods={"GET"})
     * @SWG\Get(
     *    tags={"ContentCategory"},
     *    summary="Get content category list",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Get content category list",
     *         required=true,
     *         @Model(type=DTO\GetContentCategoryListRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get content category list",
     *         @Model(type=DTO\GetContentCategoryListResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getContentCategoryList(Request $request, ContentService $service)
    {
        /** @var DTO\GetContentCategoryListRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetContentCategoryListRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories/:id", methods={"GET"})
     * @SWG\Get(
     *    tags={"ContentCategory"},
     *    summary="Get one content category by id",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Get one content category by id",
     *         required=true,
     *         @Model(type=DTO\GetOneContentCategoryByIdRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get content category list",
     *         @Model(type=DTO\GetOneContentCategoryByIdResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getOneContentCategoryById(Request $request, ContentService $service)
    {
        /** @var DTO\GetOneContentCategoryByIdRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetOneContentCategoryByIdRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories/:id/content", methods={"GET"})
     * @SWG\Get(
     *    tags={"ContentCategory"},
     *    summary="Get content of category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Get content of category",
     *         required=true,
     *         @Model(type=DTO\GetContentByCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get content of category",
     *         @Model(type=DTO\GetContentByCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getContentByCategory(Request $request, ContentService $service)
    {
        /** @var DTO\GetContentByCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetContentByCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
