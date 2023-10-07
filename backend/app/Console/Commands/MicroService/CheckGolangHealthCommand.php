<?php

namespace App\Console\Commands\MicroService;

use App\Traits\Logger;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

/**
 * Class CheckGolangHealthCommand
 */
class CheckGolangHealthCommand extends Command
{
    use Logger;

    protected $signature = 'microservice:check-golang-health';

    protected $description = 'Check if the Golang project is running';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        try {
            $response = Http::get('http://localhost:5000');

            if ($response->ok()) {
                $this->logInfo('Golang project is running.');
            } else {
                $this->logInfo('Golang project is not running.');
            }
        } catch (RequestException $exception) {
            $this->logError('Error while checking Golang project health: ' . $exception);
        }
    }
}
