<?php

namespace Tests\Functional;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

/**
 * Class BaseTestCase
 *
 * @package Tests\Functional
 */
class BaseTestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Process the application given a request method and URI
     *
     * @param String $requestMethod the request method (e.g. GET, POST, etc.)
     * @param String $requestUri the request URI
     * @param array|object|null $requestData the request data
     *
     * @return ResponseInterface
     */
    public function runApp(String $requestMethod, String $requestUri, $requestData = null) : ResponseInterface
    {
        $request = $this->createRequest($requestMethod, $requestUri, $requestData);

        $settings = require __DIR__ . '/../../config/settings.php'; // Instantiate the app

        $app = new \Slim\App($settings);

        require __DIR__ . '/../../config/dependencies.php'; // Set up dependencies
        require __DIR__ . '/../../config/middleware.php'; // Register middleware
        require __DIR__ . '/../../config/routes.php'; // Register routes

        return $app->process($request, new Response());
    }

    /**
     * @param String $requestMethod
     * @param String $requestUri
     * @param array $requestData
     *
     * @return RequestInterface
     */
    private function createRequest(String $requestMethod, String $requestUri, $requestData = null) : RequestInterface
    {
        $request = Request::createFromEnvironment(
            Environment::mock(
                [
                    'REQUEST_METHOD' => $requestMethod,
                    'REQUEST_URI' => $requestUri
                ]
            )
        );

        if (isset($requestData)) {
            return $request->withParsedBody($requestData);
        }

        return $request;
    }
}
