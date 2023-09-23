<?php


if (! function_exists('baseUrl')) {
    function baseUrl() {
        return env('APP_BASEURL');
    }
}


if (! function_exists('adminUrl')) {
    function adminUrl() {
        return env('APP_ADMIN_SUBDOMAIN') . '.' . env('APP_BASEURL');
    }
}
