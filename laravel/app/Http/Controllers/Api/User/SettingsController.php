<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\Article;
use App\Services\Redis\RedisService;
use Illuminate\Http\Response;

/**
 * Class SettingsController
 * @package App\Http\Controllers\Api\User
 */
class SettingsController extends BaseController
{
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        $articles = Article::search('Test')->get();

        dd($articles);

        $sources = $this->redisService->get('sources');
        $categories = $this->redisService->get('categories');

        return $this->ok([
            'sources' => $sources,
            'categories' => $categories,
        ], Response::HTTP_OK, __('Initial Data'));
    }
}
