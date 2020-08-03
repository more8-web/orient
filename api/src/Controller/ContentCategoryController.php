<?php

namespace App\Controller;

use App\Controller\Dto\Request\ContentCategory as ContentCategoryRequest;
use App\Controller\Dto\Response\Content as ContentResponse;
use App\Controller\Dto\Response\ContentCategory as ContentCategoryResponse;
use App\Exceptions\Auth\BadRequestException;
use App\Services\Content\ContentService;
use App\Services\ContentCategory\ContentCategoryService;
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
     *         @Model(type=ContentCategoryRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new content category",
     *         @Model(type=ContentCategoryResponse::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentCategoryService $service
     * @return JsonResponse
     * @throws BadRequestException
     */
    public function createContentCategory(Request $request, ContentCategoryService $service)
    {
        /** @var ContentCategoryRequest $dto */
        $dto = $this->getDto($request, ContentCategoryRequest::class);
        $category = $service->createContentCategory(
            $dto->getContentCategoryAlias(),
            $dto->getContentCategoryParentId()
        );

        return $this->json((new ContentCategoryResponse($category))->asArray());
    }

    /**
     * @Route("/content/categories/{id}", methods={"POST"})
     * @SWG\Post(
     *    tags={"ContentCategory"},
     *    summary="Edit content category",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Edit content category",
     *         required=true,
     *         @Model(type=ContentCategoryRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit content category",
     *         @Model(type=ContentCategoryResponse::class)
     *     ),
     * )
     * @param int $id
     * @param Request $request
     * @param ContentCategoryService $service
     * @return JsonResponse
     */
    public function editContentCategory(int $id, Request $request, ContentCategoryService $service)
    {
        /** @var ContentCategoryRequest $dto */
        $dto = $this->getDto($request, ContentCategoryRequest::class);
        $category = $service->editContentCategory($id,
                                                    $dto->getContentCategoryParentId(),
                                                    $dto->getContentCategoryAlias());

        return $this->json((new ContentCategoryResponse($category))->asArray());
    }

    /**
     * @Route("/content/categories/{id}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"ContentCategory"},
     *    summary="Delete content category",
     *     ),
     * @SWG\Response(
     *         response=204,
     *         description="Delete content category",
     *     ),
     * )
     * @param int $id
     * @param ContentCategoryService $service
     * @return JsonResponse
     */
    public function deleteContentCategory(int $id, ContentCategoryService $service)
    {
        $service->deleteContentCategory($id);

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
     *             @Model(type=ContentCategoryResponse::class)
     *          ),
     *          description="Get content category list",
     *     ),
     * )
     * @param ContentCategoryService $service
     * @return JsonResponse
     */
    public function getContentCategoryList(ContentCategoryService $service)
    {
        $contentCategories = $service->getContentCategoryList();
        $contentCategoryList = [];

        foreach ($contentCategories as $contentCategory) {
            $contentCategoryList[] = (new ContentCategoryResponse($contentCategory))->asArray();
        }

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
     *         @Model(type=ContentCategoryResponse::class)
     *     ),
     * )
     * @param $id
     * @param ContentCategoryService $service
     * @return JsonResponse
     */
    public function getOneContentCategoryById($id, ContentCategoryService $service)
    {
        $contentCategory = $service->getContentCategoryById($id);

        return $this->json((new ContentCategoryResponse($contentCategory))->asArray());
    }

    /**
     * @Route("/content/category/{id}/contents", methods={"GET"})
     * @SWG\Get(
     *    tags={"ContentCategory"},
     *    summary="Get content list by content category",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get all content by content category",
     *         @Model(type=ContentResponse::class)
     *     ),
     * )
     * @param int $id
     * @param ContentCategoryService $service
     * @return JsonResponse
     */
    public function getContentListByContentCategory(int $id, ContentCategoryService $service)
    {
        $category = $service->getContentCategoryById($id);
        $contentList = [];

        foreach($category->getContents() as $content){
            $contentList[] = (new ContentResponse($content))->asArray();
        }

        return $this->json($contentList, Response::HTTP_OK);
    }

    /**
     * @Route("/content/categories/{category}/contents/{content}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"ContentCategory"},
     *    summary="Bind content to content category (content-to-content-category)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Bind content to content category (content-to-content-category)",
     *     ),
     * )
     * @param int $category
     * @param int $content
     * @param ContentCategoryService $service
     * @return JsonResponse
     */
    public function bindContentToContentCategory(int $category, int $content, ContentCategoryService $service)
    {
        $service->bindContentToContentCategory($category, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories/{category}/contents/{content}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"ContentCategory"},
     *    summary="Unbind content to content category (content-to-content-category)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind content to content category (content-to-content-category)",
     *     ),
     * )
     * @param int $category
     * @param int $content
     * @param ContentCategoryService $service
     * @return JsonResponse
     */
    public function unbindContentToContentCategory(int $category, int $content, ContentCategoryService $service)
    {
        $service->unbindContentToContentCategory($category, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
