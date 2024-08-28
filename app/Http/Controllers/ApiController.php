<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class ApiController extends Controller
{
    protected int $statusCode = ResponseCode::HTTP_OK;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respond($data, $headers = []): JsonResponse
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message): JsonResponse
    {
        return $this->respond([
            'status' => 'error',
            'message' => $message
        ]);
    }

    /**
     * Enum
     * 201
     *
     * @param array $data
     * @return JsonResponse
     */
    public function respondEnum(array $data = []): JsonResponse
    {
        return $this->setStatusCode(ResponseCode::HTTP_OK)->respond($data);
    }

    /**
     * Created
     * 201
     *
     * @param array $data
     * @return JsonResponse
     */
    public function respondCreated(array $data = []): JsonResponse
    {
        return $this->setStatusCode(ResponseCode::HTTP_CREATED)->respond($data);
    }

    /**
     * Deleted
     * 201
     *
     * @return JsonResponse
     */
    public function respondDeleted(): JsonResponse
    {
        return $this->setStatusCode(ResponseCode::HTTP_NO_CONTENT)->respond([]);
    }

    /**
     * Updated
     * 201
     *
     * @param array $data
     * @return JsonResponse
     */
    public function respondUpdated(array $data = []): JsonResponse
    {
        return $this->respondCreated($data);
    }

    /**
     * Not found
     * 404
     *
     * @param $message
     * @return JsonResponse
     */
    public function respondNotFound($message = 'Not found'): JsonResponse
    {
        return $this->setStatusCode(ResponseCode::HTTP_NOT_FOUND)->respondWithError($message);
    }


    /**
     * Bad request
     * 400
     *
     * @param $message
     * @return JsonResponse
     */
    public function respondBadRequest($message = 'Bad request')
    {
        return $this->setStatusCode(ResponseCode::HTTP_BAD_REQUEST)->respondWithError($message);
    }
    /**
     * Credential Mismatch
     * 400
     *
     * @param $message
     * @return JsonResponse
     */
    public function respondCredentialMismatch($message = 'Credential Mismatch')
    {
        return $this->setStatusCode(ResponseCode::HTTP_BAD_REQUEST)->respondWithError($message);
    }

    /**
     * Unauthorized
     * 401
     *
     * @param $message
     * @return JsonResponse
     */
    public function respondUnauthorized($message = 'Unauthorized'): JsonResponse
    {
        return $this->setStatusCode(ResponseCode::HTTP_UNAUTHORIZED)
            ->respondWithError($message);
    }
    /**
     * Forbidden
     * 401
     *
     * @param $message
     * @return JsonResponse
     */
    public function respondForbidden($message = 'Forbidden'): JsonResponse
    {
        return $this->setStatusCode(ResponseCode::HTTP_FORBIDDEN)
            ->respondWithError($message);
    }


}
