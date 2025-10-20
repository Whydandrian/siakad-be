<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator as LaravelPaginator;

trait ApiResponseTrait
{

    protected function respond(
        mixed $data = null,
        string $status = 'success',
        string $message = '',
        int $statusCode = 200,
        array $metadata = []
    ) {
        $response = [
            'status' => $status,
            'message' => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $this->transformData($data);
        }

        if (!empty($metadata)) {
            $response['metadata'] = $metadata;
        }

        return response()->json($response, $statusCode);
    }


    /**
     * Shortcut success 200 OK.
     */
    protected function success(mixed $data, string $message = 'Success', array $metadata = [], int $statusCode = 200)
    {
        return $this->respond($data, 'success', $message, $statusCode, $metadata);
    }


    /**
     * Shortcut created 201 Created.
     */
    protected function created(mixed $data, ?string $message = null)
    {
        return $this->respond($data, 'success', $message, 201);
    }


    /**
     * Shortcut no content 204.
     */
    protected function noContent()
    {
        return response()->json(null, 204);
    }


    /**
     * Shortcut error umum (422 default).
     */
    protected function error(?string $message = null, int $statusCode = 422, mixed $errors = null)
    {
        $response = [
            'status'  => 'error',
            'code'    => $statusCode,
            'message' => $message,
        ];

        if (!is_null($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $statusCode);
    }


    /**
     * Shortcut unauthorized 401.
     */
    protected function unauthorized(?string $message = 'Unauthorized')
    {
        return $this->error($message, 401);
    }


    /**
     * Shortcut forbidden 403.
     */
    protected function forbidden(?string $message = 'Forbidden')
    {
        return $this->error($message, 403);
    }


    /**
     * Shortcut not found 404.
     */
    protected function notFound(?string $message = 'Resource not found')
    {
        return $this->error($message, 404);
    }

    protected function transformData(mixed $data)
    {
        if ($data instanceof Collection) {
            return $data->map(fn ($item) => $this->transformData($item))->toArray();
        }

        if ($data instanceof LengthAwarePaginator) {
            /** @var LaravelPaginator $data */
            return [
                'items' => $data->getCollection()->map(fn ($item) => $this->transformData($item))->toArray(),
                'meta' => [
                    'total' => $data->total(),
                    'per_page' => $data->perPage(),
                    'current_page' => $data->currentPage(),
                    'last_page' => $data->lastPage(),
                ],
            ];
        }

        if ($data instanceof Model) {
            $array = $data->toArray();

            foreach ($data->getCasts() as $key => $type) {
                if (array_key_exists($key, $array)) {
                    $array[$key] = $data->{$key};
                }
            }

            return $array;
        }
        return $data;
    }
}
