<?php

namespace SlimSampleApp\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

class HelloAction implements Invocable
{
    /** @var PhpRenderer */
    private $phpRenderer;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(PhpRenderer $phpRenderer, LoggerInterface $logger)
    {
        $this->phpRenderer = $phpRenderer;
        $this->logger = $logger;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $this->logger->info("Slim-Skeleton '/' route");

        return $this->phpRenderer->render($response, 'index.phtml', $args);
    }
}