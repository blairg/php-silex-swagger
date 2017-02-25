<?php

namespace SwaggerExample\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShoeController
{
    /**
     * @SWG\Get(
     *     path="/shoe",
     *     operationId="shoe",
     *     produces={"application/json"},
     *     tags={"shoe"},
     *     @SWG\Response(response="200", description="Successful retreival of shoes.")
     * )
     */
    /**
     * @return JsonResponse
     */
    public function getAllAction()
    {
        $shoes = [
            'Reebok' => 'Classic',
            'Nike' => 'Air Max'
        ];

        return $this->buildResponse($shoes, Response::HTTP_OK);
    }

    /**
     * @SWG\Post(
     *     path="/shoe",
     *     operationId="shoe",
     *     produces={"application/json"},
     *     tags={"shoe"},
     *     @SWG\Response(response="201", description="Shoe added.")
     * )
     */
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function postAction(Request $request)
    {
        return $this->buildResponse('Shoe added', Response::HTTP_CREATED);
    }

    /**
     * @SWG\Put(
     *     path="/shoe",
     *     operationId="shoe",
     *     produces={"application/json"},
     *     tags={"shoe"},
     *     @SWG\Response(response="200", description="Shoe updated.")
     * )
     */
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function putAction(Request $request)
    {
        return $this->buildResponse('Shoe updated', Response::HTTP_OK);
    }

    /**
     * @SWG\Delete(
     *     path="/shoe",
     *     operationId="shoe",
     *     produces={"application/json"},
     *     tags={"shoe"},
     *     @SWG\Response(response="200", description="Shoe deleted.")
     * )
     */
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        return $this->buildResponse('Shoe deleted', Response::HTTP_OK);
    }

    /**
     * @param mixed $body
     * @param int $status
     * @return JsonResponse
     */
    private function buildResponse($body, int $status)
    {
        return new JsonResponse($body, $status, [], false);
    }
}