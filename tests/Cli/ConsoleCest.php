<?php

declare(strict_types=1);

namespace App\Tests\Cli;

use App\Tests\CliTester;

final class ConsoleCest extends CliTest
{
    public function testCommandYii(CliTester $I): void
    {
        $this->runYii($I);
        $I->seeInShellOutput('Yii Console');
    }
}
