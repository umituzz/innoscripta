<?php

namespace App\Console\Commands\Redis;

use App\Contracts\ArticleRepositoryInterface;
use App\Services\Redis\RedisService;
use Illuminate\Console\Command;

/**
 * Class SetTotalArticleCommand
 */
class SetTotalArticleCommand extends Command
{
    protected $signature = 'redis:set-total-articles';

    protected $description = 'Set total articles count to redis';

    private ArticleRepositoryInterface $articleRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository
    ) {
        parent::__construct();

        $this->articleRepository = $articleRepository;
    }

    public function handle()
    {
        $count = $this->articleRepository->total();

        RedisService::set('total_articles', $count);
    }
}
