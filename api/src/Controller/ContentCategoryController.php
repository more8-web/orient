<?php

namespace App\Controller;

use App\Controller\Dto\ContentCategory as DTO;
use App\Exceptions\Auth\BadRequestException;
use App\Exceptions\Common\DatabaseException;
use App\Services\Content\ContentService;
use App\Services\ContentCategory\CreateContentCategoryService;
use App\Services\ContentCategory\DeleteContentCategoryService;
use App\Services\ContentCategory\EditContentCategoryService;
use App\Services\ContentCategory\GetContentCategoryListService;
use App\Services\ContentCategory\GetOneContentCategoryService;
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
     *         @Model(type=DTO\CreateContentCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new content category",
     *         @Model(type=DTO\CreateContentCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param CreateContentCategoryService $service
     * @return JsonResponse
     * @throws BadRequestException
     */
    public function createContentCategory(Request $request, CreateContentCategoryService $service)
    {
        /** @var DTO\CreateContentCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateContentCategoryRequestBody::class);
        $category = $service->createContentCategory(
            $dto->getContentCategoryAlias(),
            $dto->getContentCategoryParentId()
        );

        return $this->json((new DTO\CreateContentCategoryResponseBody($category))->asArray());
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
     * @param EditContentCategoryService $service
     * @return JsonResponse
     */
    public function editContentCategory(Request $request, EditContentCategoryService $service)
    {
        /** @var DTO\EditContentCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditContentCategoryRequestBody::class);
        $category = $service->editContentCategory(
            $dto->getContentCategoryId(),
            $dto->getContentCategoryParentId(),
            $dto->getContentCategoryAlias());

        return $this->json((new DTO\EditContentCategoryResponseBody($category))->asArray());
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
     *         response=204,
     *         description="Delete content category",
     *     ),
     * )
     * @param Request $request
     * @param DeleteContentCategoryService $service
     * @return JsonResponse
     */
    public function deleteContentCategory(Request $request, DeleteContentCategoryService $service)
    {
        /** @var DTO\DeleteContentCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\DeleteContentCategoryRequestBody::class);
        $message = $service->deleteContentCategory($dto->getContentCategoryId());

        if (!$message){
            throw new DatabaseException('Error delete content category');
        }
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories", methods={"GET"})
     * @SWG\Get(
     *    tags={"ContentCategory"},
     *    summary="Get content category list",
     *
     *     @SWG\Response(
     *          response=200,
     *          @SWG\Schema(
     *             type="array",
     *             @Model(type=DTO\GetContentCategoryListResponseBody::class)
     *          ),
     *          description="Get content category list",
     *     ),
     * )
     * @param Request $request
     * @param GetContentCategoryListService $service
     * @return JsonResponse
     */
    public function getContentCategoryList(Request $request, GetContentCategoryListService $service)
    {
        $contentCategoryList = $service->getContentCategoryList();

        return $this->json($contentCategoryList, Response::HTTP_OK);
    }

    /**
     * @Route("/content/categories/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"ContentCategory"},
     *    summary="Get one content category by id",
     *
     *      @SWG\Response(
     *         response=200,
     *         description="Get content category by id",
     *         @Model(type=DTO\GetOneContentCategoryByIdResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param GetOneContentCategoryService $service
     * @return JsonResponse
     */
    public function getOneContentCategoryById(Request $request, GetOneContentCategoryService $service)
    {

        $categoryContent = $service->getOneContent($request->get('id'));

        return $this->json((new DTO\GetOneContentCategoryByIdResponseBody($categoryContent))->asArray());
    }

    /**
     * @Route("/content/categories/{id}/content", methods={"GET"})
     * @SWG\Get(
     *    tags={"ContentCategory"},
     *    summary="Get content of category",
     *
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
        $idCategory = $request->get('id');
        return $this->json($idCategory, Response::HTTP_OK);
    }
}
