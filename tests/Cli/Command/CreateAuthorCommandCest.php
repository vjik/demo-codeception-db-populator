<?php

declare(strict_types=1);

namespace App\Tests\Cli\Command;

use App\Tests\Cli\CliTest;
use App\Tests\CliTester;

final class CreateAuthorCommandCest extends CliTest
{
    function _before(CliTester $I)
    {
        $I->loadDump('author');
    }

    public function testCreate(CliTester $I): void
    {
        $this->runYii($I, 'author/create Ivan');

        $I->canSeeInShellOutput('[OK] Created author ID 1.');
        $I->seeInDatabase('author', ['id' => 1, 'name' => 'Ivan']);
    }

    public function testShortName(CliTester $I): void
    {
        $this->runYii($I, 'author/create Po');

        $I->canSeeInShellOutput('[ERROR] Expected a name to contain at least 3 characters. Got: Po');
    }
}
