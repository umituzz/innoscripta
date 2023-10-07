<?php

namespace App\Console\Commands\MicroService;

use App\Traits\Logger;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

/**
 * Class PythonHealthCommand
 */
class PythonHealthCommand extends Command
{
    use Logger;

    protected $signature = 'microservice:check-python-health';

    protected $description = 'Check if the Python microservice is running';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        try {
            $response = Http::get('http://localhost:8085');

            if ($response->ok()) {
                $this->logInfo('Python microservice is running.');
            } else {
                $this->logInfo('Python microservice is not running.');
            }
        } catch (RequestException $exception) {
            $this->logError('Error while checking Python microservice health: ' . $exception);
        }
    }
}
