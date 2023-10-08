<?php

namespace App\Console\Commands\MicroService;

use Illuminate\Http\Client\RequestException;

/**
 * Class CheckGolangHealthCommand
 */
class CheckGolangHealthCommand extends BaseMicroserviceCommand
{
    protected $signature = 'microservice:check-golang-health';

    protected $description = 'Check if the Golang project is running';

    public function handle(): void
    {
        try {
            $response = $this->httpService->get('http://localhost:5000');

            if ($response->ok()) {
                $this->logInfo('Golang project is running.');
            } else {
                $this->logInfo('Golang project is not running.');
            }
        } catch (RequestException $exception) {
            $this->logError('Error while checking Golang project health: '.$exception);
        }
    }
}
