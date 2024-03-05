<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\ActiveServersAPI;
use Crafterlp\ActiveServersSdk\Http;
use ReflectionClass;
use ReflectionException;

class Manager
{
    /**
     * The ActiveServers instance.
     *
     * @var ActiveServersAPI
     */
    public ActiveServersAPI $api;

    /**
     * The Http client.
     *
     * @var Http
     */
    public Http $http;

    /**
     * @param ActiveServersAPI $api
     * @param Http $http
     */
    public function __construct(ActiveServersAPI $api, Http $http)
    {
        $this->api = $api;
        $this->http = $http;
    }

    /**
     * Convert the key name to camel case.
     *
     * @param $key
     * @return array|string|string[]
     */
    private function camelCase($key): array|string
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return lcfirst(str_replace(' ', '', implode(' ', $parts)));
    }

    public function transfer($data, $class)
    {
        try {
            $data = json_decode(json_encode($data), true);
            $reflectionClass = new ReflectionClass($class);
            $constructor = $reflectionClass->getConstructor();
            $params = [];

            foreach ($constructor->getParameters() as $param) {
                $params[] = $data[$param->getName()];
            }

            return $reflectionClass->newInstanceArgs($params);
        } catch (ReflectionException) {
            return null;
        }
    }
}