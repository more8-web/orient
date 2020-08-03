<?php

namespace App\Controller;

use App\Controller\Dto\Request\HtmlTag as HtmlTagRequest;
use App\Controller\Dto\Response\HtmlTag as HtmlTagResponse;
use App\Services\HtmlTag\HtmlTagService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class HtmlTagController extends AbstractApiController
{
    /**
     * @Route("/html/tag", methods={"PUT"})
     * @SWG\Put(
     *    tags={"HtmlTags"},
     *    summary="Create new html tag",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Create new html_tag",
     *         required=true,
     *         @Model(type=HtmlTagRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new html_tag",
     *         @Model(type=HtmlTagResponse::class)
     *     ),
     * )
     * @param Request $request
     * @param HtmlTagService $service
     * @return JsonResponse
     */
    public function createNewHtmlTag(Request $request, HtmlTagService $service)
    {
        /** @var HtmlTagRequest $dto */
        $dto = $this->getDto($request, HtmlTagRequest::class);
        $htmlTag = $service->createHtmlTag($dto->getHtmlTagValue());

        return $this->json((new HtmlTagResponse($htmlTag))->asArray());
    }

    /**
     * @Route("/html/tag/{id}", methods={"POST"})
     * @SWG\Post(
     *    tags={"HtmlTags"},
     *    summary="Edit HtmlTags",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Edit HtmlTags",
     *         required=true,
     *         @Model(type=HtmlTagRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Edit HtmlTags",
     *         @Model(type=HtmlTagResponse::class)
     *     ),
     * )
     * @param int $id
     * @param Request $request
     * @param HtmlTagService $service
     * @return JsonResponse
     */
    public function editHtmlTag(int $id, Request $request, HtmlTagService $service)
    {
        /** @var HtmlTagRequest $dto */
        $dto = $this->getDto($request, HtmlTagRequest::class);
        $htmlTag = $service->editHtmTag($id, $dto->getHtmlTagValue());

        return $this->json((new HtmlTagResponse($htmlTag))->asArray());
    }

    /**
     * @Route("/html/tag/{id}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"HtmlTags"},
     *    summary="Delete HtmlTags",
     *    @SWG\Response(
     *        response=204,
     *        description="Success delete news",
     *     ),
     * )
     * @param int $id
     * @param HtmlTagService $service
     * @return JsonResponse
     */
    public function deleteHtmlTags(int $id, HtmlTagService $service)
    {
        $service->deleteHtmlTag($id);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/html/tags", methods={"GET"})
     * @SWG\Get(
     *    tags={"HtmlTags"},
     *    summary="Get HtmlTags list",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get HtmlTags list",
     *         @Model(type=HtmlTagResponse::class)
     *     ),
     * )
     * @param HtmlTagService $service
     * @return JsonResponse
     */
    public function getHtmlTagsList(HtmlTagService $service)
    {
        $htmlTags = $service->getHtmlTagList();
        $htmlTagList = [];

        foreach ($htmlTags as $htmlTag){
            $htmlTagList[] = (new HtmlTagResponse($htmlTag))->asArray();
        }

        return $this->json($htmlTagList, Response::HTTP_OK);
    }

    /**
     * @Route("/html/tag/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"HtmlTags"},
     *    summary="Get one HtmlTag by id",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get one HtmlTag by id",
     *         @Model(type=HtmlTagResponse::class)
     *     ),
     * )
     * @param int $id
     * @param HtmlTagService $service
     * @return JsonResponse
     */
    public function getOneHtmlTagById(int $id, HtmlTagService $service)
    {
        $htmlTag = $service->getHtmlTagById($id);

        return $this->json((new HtmlTagResponse($htmlTag))->asArray());
    }

    /**
     * @Route("/html/tag/{tag}/content/{content}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"HtmlTags"},
     *    summary="Bind HtmlTags to content (content-to-html_tag)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Bind HtmlTags to content (content-to-html_tag)",
     *     ),
     * )
     * @param $tag
     * @param $content
     * @param HtmlTagService $service
     * @return JsonResponse
     */
    public function bindHtmlTagToContent($tag, $content, HtmlTagService $service)
    {
        $service->bindHtmlTagToContent($tag, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/html/tag/{tag}/content/{content}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"HtmlTags"},
     *    summary="Unbind HtmlTags to content (content-to-html_tag)",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind HtmlTags content",
     *     ),
     * )
     * @param $tag
     * @param $content
     * @param HtmlTagService $service
     * @return JsonResponse
     */
    public function unbindHtmlTagToContent($tag, $content, HtmlTagService $service)
    {
        $service->unbindHtmlTagToContent($tag, $content);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
