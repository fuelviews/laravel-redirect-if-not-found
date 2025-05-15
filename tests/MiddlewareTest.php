<?php

use Fuelviews\RedirectIfNotFound\Middleware\RedirectIfNotFoundMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

it('redirects on 404 response', function () {
    // Set up the config
    config(['redirect-if-not-found.enabled' => true]);
    config(['redirect-if-not-found.fallback_route' => 'home']);
    config(['redirect-if-not-found.fallback_status_code' => 301]);
    config(['redirect-if-not-found.environments' => [app()->environment()]]);

    // Create a request
    $request = Request::create('/not-found-page', 'GET');

    // Create a middleware instance
    $middleware = new RedirectIfNotFoundMiddleware();

    // Create a next closure that returns a 404 response
    $next = function ($request) {
        return new Response('Not Found', 404);
    };

    // Execute the middleware
    $response = $middleware->handle($request, $next);

    // Assert that the response is a redirect
    expect($response)->toBeInstanceOf(SymfonyResponse::class)
        ->and($response->isRedirect())->toBeTrue()
        ->and($response->getStatusCode())->toBe(301);
});

it('does not redirect on successful response', function () {
    // Set up the config
    config(['redirect-if-not-found.enabled' => true]);
    config(['redirect-if-not-found.environments' => [app()->environment()]]);

    // Create a request
    $request = Request::create('/existing-page', 'GET');

    // Create a middleware instance
    $middleware = new RedirectIfNotFoundMiddleware();

    // Create a next closure that returns a 200 response
    $next = function ($request) {
        return new Response('Success', 200);
    };

    // Execute the middleware
    $response = $middleware->handle($request, $next);

    // Assert that the response is not a redirect
    expect($response)->toBeInstanceOf(SymfonyResponse::class)
        ->and($response->isRedirect())->toBeFalse()
        ->and($response->getStatusCode())->toBe(200);
});

it('redirects on 500 response', function () {
    // Set up the config
    config(['redirect-if-not-found.enabled' => true]);
    config(['redirect-if-not-found.fallback_route' => 'home']);
    config(['redirect-if-not-found.fallback_status_code' => 301]);
    config(['redirect-if-not-found.environments' => [app()->environment()]]);

    // Create a request
    $request = Request::create('/error-page', 'GET');

    // Create a middleware instance
    $middleware = new RedirectIfNotFoundMiddleware();

    // Create a next closure that returns a 500 response
    $next = function ($request) {
        return new Response('Server Error', 500);
    };

    // Execute the middleware
    $response = $middleware->handle($request, $next);

    // Assert that the response is a redirect
    expect($response)->toBeInstanceOf(SymfonyResponse::class)
        ->and($response->isRedirect())->toBeTrue()
        ->and($response->getStatusCode())->toBe(301);
});
