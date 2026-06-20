<?php

if (! function_exists('active_class')) {
    function active_class(string $route): string
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}

if (! function_exists('is_active')) {
    function is_active(string $route): bool
    {
        return request()->routeIs($route);
    }
}

if (! function_exists('active_param_class')) {
    function active_param_class(string $route, string $param, string $value): string
    {
        return (request()->routeIs($route) && request()->route($param) === $value) ? 'active' : '';
    }
}