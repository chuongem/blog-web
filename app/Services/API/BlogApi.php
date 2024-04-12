<?php

namespace App\Services\API;

use App\Services\API\ApiService;
use Illuminate\Support\Facades\Http;

class BlogApi
{
    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getNavigation()
    {
        $url = $this->apiService->getUrl('/001');
        $response = Http::post($url);
        if ($response->getStatusCode() == 200) {
            $content = $response->getBody()->getContents();
            $result = json_decode($content, true);
        }

        return $result['data'];
    }

    public function getCategory()
    {
        $url = $this->apiService->getUrl('/005');
        $response = Http::post($url);
        if ($response->getStatusCode() == 200) {
            $content = $response->getBody()->getContents();
            $result = json_decode($content, true);
        }
        return $result['data'];
    }

    public function getDetail($slug, $page = 1)
    {
        $url = $this->apiService->getUrl('/005');

        $data = [
            'page' => $page,
            'slug' => $slug,
        ];
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
        ];

        $response = Http::withHeaders($headers)->post($url, $data);
        if ($response->successful()) {
            $result = $response->json();
            if (isset($result['data'])) {
                return $result['data'];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
