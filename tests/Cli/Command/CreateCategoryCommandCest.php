<?php

declare(strict_types=1);

namespace App\Tests\Cli\Command;

use App\Tests\Cli\CliTest;
use App\Tests\CliTester;

final class CreateCategoryCommandCest extends CliTest
{
    function _before(CliTester $I)
    {
        $I->loadDump('category');
    }

    public function testCreate(CliTester $I): void
    {
        $this->runYii($I, 'category/create World');

        $I->canSeeInShellOutput('[OK] Created category ID 1.');
        $I->seeInDatabase('category', ['id' => 1, 'name' => 'World']);
    }

    public function testShortName(CliTester $I): void
    {
        $this->runYii($I, 'category/create IT');

        $I->canSeeInShellOutput('[ERROR] Expected a name to contain at least 3 characters. Got: IT');
    }
}
