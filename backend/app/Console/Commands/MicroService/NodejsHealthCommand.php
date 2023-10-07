<?php

namespace App\Console\Commands\MicroService;

use App\Traits\Logger;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

/**
 * Class NodejsHealthCommand
 */
class NodejsHealthCommand extends Command
{
    use Logger;

    protected $signature = 'microservice:check-nodejs-health';

    protected $description = 'Check if the Node.js microservice is running';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        try {
            $response = Http::get('http://localhost:4000');

            if ($response->ok()) {
                $this->logInfo('Node.js microservice is running.');
            } else {
                $this->logInfo('Node.js microservice is not running.');
            }
        } catch (RequestException $exception) {
            $this->logError('Error while checking Node.js microservice health: ' . $exception);
        }
    }
}
