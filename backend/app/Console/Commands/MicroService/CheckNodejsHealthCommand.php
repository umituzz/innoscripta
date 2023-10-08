<?php

namespace App\Console\Commands\MicroService;

use Illuminate\Http\Client\RequestException;

/**
 * Class CheckNodejsHealthCommand
 */
class CheckNodejsHealthCommand extends BaseMicroserviceCommand
{
    protected $signature = 'microservice:check-nodejs-health';

    protected $description = 'Check if the Node.js microservice is running';

    public function handle(): void
    {
        try {
            $response = $this->httpService->get('http://localhost:4000');

            if ($response->ok()) {
                $this->logInfo('Node.js microservice is running.');
            } else {
                $this->logInfo('Node.js microservice is not running.');
            }
        } catch (RequestException $exception) {
            $this->logError('Error while checking Node.js microservice health: '.$exception);
        }
    }
}
