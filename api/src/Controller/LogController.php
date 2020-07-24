<?php

namespace App\Controller;

use App\Controller\Dto\Log as DTO;
use App\Entity\Log;
use App\Services\Log\LogService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class LogController extends AbstractApiController
{
    /**
     * @Route("/log", methods={"PUT"})
     * @SWG\Put(
     *    tags={"Logs"},
     *    summary="Create log",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Create new log",
     *         required=true,
     *         @Model(type=DTO\CreateLogRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new html_tag",
     *         @Model(type=DTO\CreateLogResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param LogService $service
     * @return JsonResponse
     */
    public function createLog(Request $request, LogService $service)
    {
        /** @var DTO\CreateLogRequestBody $dto */
        $dto = $this->getDto($request, DTO\CreateLogRequestBody::class);
        $log = $service->createLog($dto->getLogValue());

        return $this->json((new DTO\CreateLogResponseBody($log))->asArray());
    }

    /**
     * @Route("/log", methods={"GET"})
     * @SWG\Get(
     *    tags={"Logs"},
     *    summary="Get log list",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get log list",
     *         @Model(type=DTO\GetLogListResponseBody::class)
     *     ),
     * )
     * @param LogService $service
     * @return JsonResponse
     */
    public function getLogList(LogService $service)
    {
        $log = $service->getLogList();

        return $this->json($log, Response::HTTP_OK);
    }

    /**
     * @Route("/log/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"HtmlTags"},
     *    summary="Get log by id",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get log by id",
     *         @Model(type=DTO\GetLogByIdResponseBody::class)
     *     ),
     * )
     * @param int $id
     * @param LogService $service
     * @return JsonResponse
     */
    public function getOneLogById(int $id, LogService $service)
    {
        $log = $service->getOneLogById($id);

        return $this->json((new DTO\GetLogByIdResponseBody($log))->asArray());
    }

    /**
     * @Route("/log/{log}/content/{content}", methods={"PUT"})
     * @SWG\Put(
     *    tags={"HtmlTags"},
     *    summary="Bind log to content",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Bind log to content (content-to-html_tag)",
     *     ),
     * )
     * @param $log
     * @param $contentId
     * @param LogService $service
     * @return JsonResponse
     */
    public function bindLogToContent($log, $contentId, LogService $service)
    {
        $service->bindHtmlTagToContent($log, $contentId);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/log/{log}/content/{content}", methods={"DELETE"})
     * @SWG\Delete(
     *    tags={"Logs"},
     *    summary="Unbind log to content",
     *     ),
     * @SWG\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Unbind log to content",
     *     ),
     * )
     * @param $log
     * @param $contentId
     * @param LogService $service
     * @return JsonResponse
     */
    public function unbindLogToContent($log, $contentId, LogService $service)
    {
        $service->unbindLogToContent($log, $contentId);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
