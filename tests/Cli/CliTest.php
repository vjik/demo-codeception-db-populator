<?php

declare(strict_types=1);

namespace App\Tests\Cli;

use App\Tests\CliTester;

use function dirname;

abstract class CliTest
{
    protected function runYii(CliTester $I, string $parameters = null): void
    {
        $I->runShellCommand(
            dirname(__DIR__, 2) . '/yii' .
            ($parameters === null ? '' : (' ' . $parameters)),
            false
        );
    }
}
