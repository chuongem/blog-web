<?php

namespace App\Http\Controllers;

use App\Services\API\BlogApi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    private $blogApi;
    public function __construct(BlogApi $blogApi)
    {
        $this->blogApi = $blogApi;
    }

    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $data = $this->blogApi->getDetail('', $page);
        $isValidPage = !is_numeric($page) || $page > $data['total'] || $page < 1;
        if ($isValidPage) {
            abort(404);
        }
        return view('front.index', compact('data'));
    }

    public function detailFeature(Request $request, $slug)
    {
        $now = Carbon::now()->toFormattedDateString();
        $page = $request->query('page', 1);
        $data = $this->blogApi->getDetail($slug, $page);

        if ($data['type'] == 'NEWS') {
            $details = $data['content'];
            return view('front.detail', compact('details', 'now'));
        } else if ($data['type'] == 'DIVISION') {
            $categoryList = $data['content'];
            $isValidPage = !is_numeric($page) || $page > $data['total'] || $page < 1;
            if ($isValidPage) {
                abort(404);
            }
            return view('front.category', compact('categoryList', 'now', 'data'));
        } else {
            abort(404);
        }
    }
}
