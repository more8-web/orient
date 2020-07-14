<?php

namespace App\Controller;

use App\Controller\Dto\Content as DTO;
use App\Services\Content\ContentService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class ContentController extends AbstractApiController
{
    /**
     * @Route("/content", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Create new content",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Create new content",
     *         required=true,
     *         @Model(type=DTO\CreateNewContentRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new content",
     *         @Model(type=DTO\CreateNewContentResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function createNewContent(Request $request, ContentService $service)
    {
        /** @var DTO\CreateNewContentRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateNewContentRequestBody::class);
        var_dump($dto); die();
        $content = $service->createNewContent(  $dto->getContentAlias(),
                                                $dto->getContentDescription(),
                                                $dto->getContentValue());

        return $this->json((new DTO\CreateNewContentResponseBody($content))->asArray());
    }

    /**
     * @Route("/contents/:id", methods={"POST"})
     * @SWG\Post(
     *    tags={"Content"},
     *    summary="Edit content",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Edit content",
     *         required=true,
     *         @Model(type=DTO\EditContentRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit content",
     *         @Model(type=DTO\EditContentResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function editContent(Request $request, ContentService $service)
    {
        /** @var DTO\EditContentRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditContentRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/contents/:id", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Content"},
     *    summary="Delete content",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Delete content",
     *         required=true,
     *         @Model(type=DTO\DeleteContentRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Delete content",
     *         @Model(type=DTO\DeleteContentResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function deleteContent(Request $request, ContentService $service)
    {
        /** @var DTO\EditContentRequestBody $dto */
        $dto = $this->getDto($request, DTO\EditContentRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/contents/:id", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get one content",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Get one content",
     *         required=true,
     *         @Model(type=DTO\GetOneContentRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get one content",
     *         @Model(type=DTO\GetOneContentResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getOneContent(Request $request, ContentService $service)
    {
        /** @var DTO\GetOneContentRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetOneContentRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/content/categories/:id/contents/:id", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Bind content to content category (content-to-content-category)",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Bind content to content category (content-to-content-category)",
     *         required=true,
     *         @Model(type=DTO\BindContentToContentCategoryRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Bind content to content category (content-to-content-category)",
     *         @Model(type=DTO\BindContentToContentCategoryResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function bindContentToContentCategory(Request $request, ContentService $service)
    {
        /** @var DTO\BindContentToContentCategoryRequestBody $dto */
        $dto = $this->getDto($request, DTO\BindContentToContentCategoryRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/:id/contents", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get all content of news",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Get all content of news",
     *         required=true,
     *         @Model(type=DTO\GetAllContentOfNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get all content of news",
     *         @Model(type=DTO\GetAllContentOfNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getAllContentOfNews(Request $request, ContentService $service)
    {
        /** @var DTO\GetAllContentOfNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetAllContentOfNewsRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/:id/contents/:id", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get one content of news",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Get one content of news",
     *         required=true,
     *         @Model(type=DTO\GetOneContentOfNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get one content of news",
     *         @Model(type=DTO\GetOneContentOfNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getOneContentOfNews(Request $request, ContentService $service)
    {
        /** @var DTO\GetOneContentOfNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\GetOneContentOfNewsRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/:id/contents/:id", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Bind content to news (news-content-to-news)",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Bind content to news (news-content-to-news)",
     *         required=true,
     *         @Model(type=DTO\BindContentToNewsRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Bind content to news (news-content-to-news)",
     *         @Model(type=DTO\BindContentToNewsResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function bindContentToNews(Request $request, ContentService $service)
    {
        /** @var DTO\BindContentToNewsRequestBody $dto */
        $dto = $this->getDto($request, DTO\BindContentToNewsRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/contents/:id/tags/:string_id", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Bind content to html tag (news-content-to-html-tag)",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Bind content to html tag (news-content-to-html-tag)",
     *         required=true,
     *         @Model(type=DTO\BindContentToHtmlTagRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Bind content to html tag (news-content-to-html-tag)",
     *         @Model(type=DTO\BindContentToHtmlTagResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function bindContentToHtmlTag(Request $request, ContentService $service)
    {
        /** @var DTO\BindContentToHtmlTagRequestBody $dto */
        $dto = $this->getDto($request, DTO\BindContentToHtmlTagRequestBody::class);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
