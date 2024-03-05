<?php

namespace Crafterlp\ActiveServersSdk;

use Crafterlp\ActiveServersSdk\Exceptions\AccessDeniedException;
use Crafterlp\ActiveServersSdk\Exceptions\ActionFailedException;
use Crafterlp\ActiveServersSdk\Exceptions\NotFoundException;
use Crafterlp\ActiveServersSdk\Exceptions\TimeoutException;
use Crafterlp\ActiveServersSdk\Exceptions\ValidationException;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Http
{
    /**
     * The ActiveServersAPI instance.
     *
     * @var ActiveServersAPI
     */
    protected ActiveServersAPI $api;

    /**
     * The ActiveServers base uri.
     *
     * @var string
     */
    public string $baseUri;

    /**
     * The Email Address of your account for the ActiveServersAPI API.
     *
     * @var string
     */
    private string $email;

    /**
     * The Password of your account for the ActiveServersAPI API.
     *
     * @var string
     */
    private string $password;

    /**
     * The GuzzleHttp client.
     *
     * @var Client
     */
    protected Client $guzzle;

    public function __construct(ActiveServersAPI $api, Client $guzzle = null)
    {
        $this->api = $api;

        $this->baseUri = $this->api->getUri();

        $this->email = $this->api->getEmail();

        $this->password = $this->api->getPassword();

        $this->guzzle = $guzzle ?: new Client([
            'base_uri'    => $this->baseUri,
            'http_errors' => false,
            'headers'     => [
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }

    /**
     * Make a GET request and return the response.
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public function get(string $uri, array $query = []): mixed
    {
        try {
            return $this->request('GET', $uri, $query);
        } catch (Exception|GuzzleException $e) {
            return new TimeoutException($e->getMessage());
        }
    }

    /**
     * Make a POST request and return the response.
     *
     * @param string $uri
     * @param array $query
     * @param array $payload
     *
     * @return mixed
     */
    public function post(string $uri, array $query = [], array $payload = []): mixed
    {
        try {
            return $this->request('POST', $uri, $query, $payload);
        } catch (Exception|GuzzleException $e) {
            return new TimeoutException($e->getMessage());
        }
    }

    /**
     * Make a PUT request and return the response.
     *
     * @param string $uri
     * @param array $query
     * @param array $payload
     *
     * @return mixed
     */
    public function put(string $uri, array $query = [], array $payload = []): mixed
    {
        try {
            return $this->request('PUT', $uri, $query, $payload);
        } catch (Exception|GuzzleException $e) {
            return new TimeoutException($e->getMessage());
        }
    }

    /**
     * Make a PATCH request and return the response.
     *
     * @param string $uri
     * @param array $query
     * @param array $payload
     *
     * @return mixed
     */
    public function patch(string $uri, array $query = [], array $payload = []): mixed
    {
        try {
            return $this->request('PATCH', $uri, $query, $payload);
        } catch (Exception|GuzzleException $e) {
            return new TimeoutException($e->getMessage());
        }
    }

    /**
     * Make a DELETE request and return the response.
     *
     * @param string $uri
     * @param array $query
     * @param array $payload
     *
     * @return mixed
     */
    public function delete(string $uri, array $query = [], array $payload = []): mixed
    {
        try {
            return $this->request('DELETE', $uri, $query, $payload);
        } catch (Exception|GuzzleException $e) {
            return new TimeoutException($e->getMessage());
        }
    }

    /**
     * Make request and return the response.
     *
     * @param string $method
     * @param string $uri
     * @param array $query
     * @param array $payload
     *
     * @return mixed
     * @throws Exception|GuzzleException
     */
    public function request(string $method, string $uri, array $query = [], array $payload = []): mixed
    {
        $url = $this->baseUri."/public/".$uri;

        $body = json_encode($payload);

        $email = $this->email;
        $password = $this->password;

        // Request to get the access token
        $responseToken = $this->guzzle->request('POST',  "$this->baseUri/login", [
            'json' => ['email' => $email, 'password' => $password],
            'debug' => false,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        if ($responseToken->getStatusCode() != 200) {
            $this->handleRequestError($responseToken);
        }

        // Extract the access token from the response
        $accessToken = json_decode($responseToken->getBody(), true)['data']['accessToken'];

        // Send subsequent requests with the access token in the Authorization header
        $options['query'] = $query;
        $options['body'] = $body;
        $options['debug'] = false;
        $options['headers']['Authorization'] = 'Bearer '.$accessToken;

        // Make the actual request with the access token included in the headers
        $response = $this->guzzle->request($method, $url, $options);

        if ($response->getStatusCode() != 200 && $response->getStatusCode() != 204 && $response->getStatusCode() != 201) {
            $this->handleRequestError($response);
        }

        // Process and return the response data
        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return void
     * @throws Exception
     */
    private function handleRequestError(ResponseInterface $response): void
    {
        throw match ($response->getStatusCode()) {
            400 => new ActionFailedException((string)$response->getBody()),
            403 => new AccessDeniedException(),
            404 => new NotFoundException(),
            422 => new ValidationException(json_decode((string)$response->getBody(), true)),
            default => new Exception((string)$response->getBody()),
        };
    }
}