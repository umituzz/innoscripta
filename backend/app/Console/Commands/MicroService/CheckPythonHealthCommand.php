<?php

namespace App\Console\Commands\MicroService;

use Illuminate\Http\Client\RequestException;

/**
 * Class CheckPythonHealthCommand
 */
class CheckPythonHealthCommand extends BaseMicroserviceCommand
{
    protected $signature = 'microservice:check-python-health';

    protected $description = 'Check if the Python microservice is running';

    public function handle(): void
    {
        try {
            $response = $this->httpService->get('http://localhost:8085');

            if ($response->ok()) {
                $this->logInfo('Python microservice is running.');
            } else {
                $this->logInfo('Python microservice is not running.');
            }
        } catch (RequestException $exception) {
            $this->logError('Error while checking Python microservice health: '.$exception);
        }
    }
}
