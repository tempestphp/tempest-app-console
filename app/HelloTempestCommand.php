<?php

namespace App;

use Tempest\Console\ConsoleCommand;
use Tempest\Console\HasConsole;

final readonly class HelloTempestCommand
{
    use HasConsole;

    #[ConsoleCommand]
    public function __invoke(string $name = 'Tempest'): void
    {
        $this->success("Hello, {$name}!");

        // Read more: https://tempestphp.com/docs/console/getting-started/
    }
}