<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Tempest\Console\Testing\ConsoleTester;
use Tempest\Container\Container;
use Tempest\Core\AppConfig;
use Tempest\Core\Kernel;

abstract class IntegrationTestCase extends TestCase
{
    protected string $root;

    /** @var \Tempest\Core\DiscoveryLocation[] */
    protected array $discoveryLocations = [];

    protected AppConfig $appConfig;

    protected Kernel $kernel;

    protected Container $container;

    protected ConsoleTester $console;

    protected function setUp(): void
    {
        parent::setUp();

        $this->root ??= __DIR__ . '/../';

        $this->kernel ??= Kernel::boot(
            root: $this->root,
            discoveryLocations: $this->discoveryLocations,
        );

        $this->container = $this->kernel->container;

        $this->console = $this->container->get(ConsoleTester::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->root);
        unset($this->discoveryLocations);
        unset($this->appConfig);
        unset($this->kernel);
        unset($this->container);
        unset($this->console);
    }
}