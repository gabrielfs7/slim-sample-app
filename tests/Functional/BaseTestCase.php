<?php

namespace Tests\Functional;

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
     * @return \Slim\Http\Response
     */
    public function runApp(String $requestMethod, String $requestUri, $requestData = null)
    {
        $request = $this->createRequest($requestMethod, $requestUri, $requestData);

        $app = $this->createApp();

        return $app->process($request, new Response());
    }

    /**
     * @return App
     */
    private function createApp()
    {
        $settings = require __DIR__ . '/../../src/settings.php';

        $app = new App($settings);

        require __DIR__ . '/../../src/dependencies.php';
        require __DIR__ . '/../../src/middleware.php';
        require __DIR__ . '/../../src/routes.php';

        return $app;
    }

    /**
     * @param String $requestMethod
     * @param String $requestUri
     * @param array $requestData
     *
     * @return Request
     */
    private function createRequest(String $requestMethod, String $requestUri, $requestData = null)
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
