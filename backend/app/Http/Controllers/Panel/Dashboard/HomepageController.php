<?php

namespace App\Http\Controllers\Panel\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Redis\RedisService;

/**
 * Class HomepageController
 * @package App\Http\Controllers\Dashboard
 */
class HomepageController extends Controller
{
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        $totalArticles = $this->redisService->get('total_articles');
        $totalUsers = $this->redisService->get('total_users');

        return view('dashboard.homepage', [
            'totalArticles' => $totalArticles,
            'totalUsers' => $totalUsers,
        ]);
    }
}
