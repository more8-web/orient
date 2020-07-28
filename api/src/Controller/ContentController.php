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
        $content = $service->editContent($dto->getId(),
                                            $dto->getContentAlias(),
                                            $dto->getContentDescription(),
                                            $dto->getContentValue());

        return $this->json((new DTO\EditContentResponseBody($content))->asArray());
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
     *         response=204,
     *         description="Delete content",
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function deleteContent(Request $request, ContentService $service)
    {
        /** @var DTO\DeleteContentRequestBody $dto */
        $dto = $this->getDto($request, DTO\DeleteContentRequestBody::class);
        $service->deleteContent($dto->getId());

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/contents/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"Content"},
     *    summary="Get one content by id",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Get one content by id",
     *         @Model(type=DTO\GetOneContentResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function getOneContent(Request $request, ContentService $service)
    {

        $content = $service->getOneContentById($request->get('id'));

        return $this->json((new DTO\GetOneContentResponseBody($content))->asArray());
    }

    /**
     * @Route("/content/categories/{id}/contents/{contentId}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Bind content to content category (content-to-content-category)",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Bind content to content category (content-to-content-category)",
     *     ),
     * )
     * @param int $id
     * @param int $contentId
     * @param ContentService $service
     * @return JsonResponse
     */
    public function bindContentToContentCategory(int $id, int $contentId, ContentService $service)
    {

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/contents/:id/tags/:string_id", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Bind content to html tag (news-content-to-html-tag)",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Bind content to html tag (news-content-to-html-tag)",
     *     ),
     * )
     * @param Request $request
     * @param ContentService $service
     * @return JsonResponse
     */
    public function bindContentToHtmlTag(Request $request, ContentService $service)
    {

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/{news}/content/{content}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Bind content to news (content-to-news)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Bind content to news (content-to-news)",
     *     ),
     * )
     * @param int $news
     * @param int $content
     * @param ContentService $service
     * @return JsonResponse
     */
    public function bindContentToNews(int $news, int $content, ContentService $service)
    {
        $service->bindContentToNews($news, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/news/{newsId}/content/{contentId}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Content"},
     *    summary="Unbind content to news (content-to-news)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind content to news (content-to-news)",
     *     ),
     * )
     * @param int $news
     * @param int $content
     * @param ContentService $service
     * @return JsonResponse
     */
    public function unbindContentToNews(int $news, int $content, ContentService $service)
    {
        $service->unbindContentToNews($news, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
