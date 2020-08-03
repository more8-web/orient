<?php

namespace App\Controller;

use App\Controller\Dto\Request\Log as LogRequest;
use App\Controller\Dto\Response\Log as LogResponse;
use App\Services\Log\LogService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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
     *         @Model(type=LogRequest::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Create new html_tag",
     *         @Model(type=LogResponse::class)
     *     ),
     * )
     * @param Request $request
     * @param LogService $service
     * @return JsonResponse
     */
    public function createLog(Request $request, LogService $service)
    {
        /** @var LogRequest $dto */
        $dto = $this->getDto($request, LogRequest::class);
        try {
            $log = $service->createLog($dto->getLogValue());
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        return $this->json((new LogResponse($log))->asArray());
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
     *         @Model(type=LogResponse::class)
     *     ),
     * )
     * @param LogService $service
     * @return JsonResponse
     */
    public function getLogList(LogService $service)
    {
        $logs = $service->getLogList();
        $logList = [];

        foreach ($logs as $log){
            $logList[] = (new LogResponse($log))->asArray();
        }

        return $this->json($logList, Response::HTTP_OK);
    }

    /**
     * @Route("/log/{id}", methods={"GET"})
     * @SWG\Get(
     *    tags={"Logs"},
     *    summary="Get log by id",
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Get log by id",
     *         @Model(type=LogResponse::class)
     *     ),
     * )
     * @param int $id
     * @param LogService $service
     * @return JsonResponse
     */
    public function getOneLogById(int $id, LogService $service)
    {
        $log = $service->getOneLogById($id);

        return $this->json((new LogResponse($log))->asArray());
    }
}
