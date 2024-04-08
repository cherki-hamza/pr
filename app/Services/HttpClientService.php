<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;

class HttpClientService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $token;

    /**
     * @var HttpClientService|null
     */
    private static $instance = null;

    /**
     * @return HttpClientService
     */
    public static function getInstance(): HttpClientService
    {
        if (self::$instance == null) {
            self::$instance = new HttpClientService();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->client = new Client();
    }

    public function setRequest(Request $request): self
    {
        $this->token = $request->bearerToken();
        return $this;
    }

    public function send(string $url, string $method = 'GET', array $options = [], string $contentType = 'application/json'): JsonResponse
    {
        $defaultOptions = [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept'        => $contentType,
                'Content-Type'  => $contentType
            ]
        ];

        $mergedOptions = array_merge($defaultOptions, $options);

        return $this->handleRequest(function() use ($method, $url, $mergedOptions) {
            return $this->client->request($method, $url, $mergedOptions);
        });
    }

    public function sendFormData(string $url, array $data, string $method = 'PUT'): JsonResponse
    {
        $multipart = [];
        foreach ($data as $key => $value) {
            $field = ['name' => $key];

            if ($value instanceof UploadedFile) {
                $field['contents'] = file_get_contents($value->getPathname());
                $field['filename'] = $value->getClientOriginalName();
            } elseif (is_array($value)) {
                foreach ($value as $subKey => $subValue) {
                    $multipart[] = [
                        'name'     => "{$key}[{$subKey}]",
                        'contents' => $subValue
                    ];
                }
                continue;
            } else {
                $field['contents'] = $value;
            }

            $multipart[] = $field;
        }

        $options = [
            'headers'   => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept'        => 'application/json',
            ],
            'multipart' => $multipart
        ];

        return $this->handleRequest(function() use ($method, $url, $options) {
            return $this->client->request($method, $url, $options);
        });
    }

    private function handleRequest(callable $requestFn): JsonResponse
    {
        try {
            $response = $requestFn();

            return response()->json([
                'status' => $response->getStatusCode(),
                'data'   => json_decode($response->getBody()->getContents(), true)
            ]);
        } catch (RequestException $e) {
            return $this->handleException($e);
        }
    }

    private function handleException(RequestException $e): JsonResponse
    {
        if ($e->hasResponse()) {
            $error = $e->getResponse();

            return response()->json([
                'error' => [
                    'code'    => $error->getStatusCode(),
                    'message' => $error->getReasonPhrase(),
                    'body'    => $error->getBody(),
                ]
            ]);
        } else {
            return response()->json([
                'error' => [
                    'code'    => 500,
                    'message' => "Internal Server Error, Please try again."
                ]
            ]);
        }
    }
}
