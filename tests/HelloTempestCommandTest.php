<?php

declare(strict_types=1);

namespace Tests;

/**
 * @internal
 */
final class HelloTempestCommandTest extends IntegrationTestCase
{
    public function test_index(): void
    {
        $this->console
            ->call('hello:tempest Brent')
            ->assertSee('Hello, Brent');
    }
}
