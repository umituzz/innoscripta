<?php

namespace App\Console\Commands\MicroService;

use App\Services\Http\HttpService;
use App\Traits\Logger;
use Illuminate\Console\Command;

/**
 * Class BaseMicroserviceCommand
 */
class BaseMicroserviceCommand extends Command
{
    use Logger;

    protected $signature = 'microservice:base';

    protected HttpService $httpService;

    public function __construct(HttpService $httpService)
    {
        parent::__construct();

        $this->httpService = $httpService;
    }
}
