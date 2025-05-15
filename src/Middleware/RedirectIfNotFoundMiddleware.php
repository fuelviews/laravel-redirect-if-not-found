<?php

namespace Fuelviews\RedirectIfNotFound\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotFoundMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->shouldApplyMiddleware() || $this->isExcludedRoute($request)) {
            return $next($request);
        }

        if ($this->isExcludedRoute($request)) {
            return $next($request);
        }

        $response = $next($request);

        if (in_array($response->status(), [404, 500], true)) {
            return redirect()->route(config('redirect-if-not-found.fallback_route', 'home'))
                ->setStatusCode(config('redirect-if-not-found.fallback_status_code', 301));
        }

        return $response;
    }

    protected function shouldApplyMiddleware(): bool
    {
        if (! config('redirect-if-not-found.enabled', true)) {
            return false;
        }

        $allowedEnvironments = config('redirect-if-not-found.environments', ['development', 'production']);

        return app()->environment($allowedEnvironments);
    }

    protected function isExcludedRoute(Request $request): bool
    {
        $excludedPatterns = config('redirect-if-not-found.excluded_patterns', [
            'admin/*', 'dashboard/admin/*', 'livewire/*', 'api/*', 'glide/*',
        ]);

        foreach ($excludedPatterns as $excludedPattern) {
            if ($request->is($excludedPattern)) {
                return true;
            }
        }

        return false;
    }
}
