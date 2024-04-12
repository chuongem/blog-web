<?php

namespace App\Services\API;

class ApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getUrl($path)
    {
        return $this->baseUrl . $path;
    }
}
