<?php

declare(strict_types=1);

namespace App\Tests\Cli\Command;

use App\Tests\Cli\CliTest;
use App\Tests\CliTester;

final class DeleteCategoryCommandCest extends CliTest
{
    function _before(CliTester $I)
    {
        $I->loadDump('category', 'post');
    }

    public function testDelete(CliTester $I): void
    {
        $I->loadRows('categories');

        $this->runYii($I, 'category/delete 1');

        $I->canSeeInShellOutput('[OK] Category ID 1 deleted.');
        $I->dontSeeInDatabase('category', ['id' => 1]);
        $I->seeInDatabase('category', ['id' => 2]);
    }

    public function testNotExist(CliTester $I): void
    {
        $this->runYii($I, 'category/delete 1');

        $I->canSeeInShellOutput('[ERROR] Category with ID 1 not found.');
    }

    public function testWithExistPost(CliTester $I): void
    {
        $I->loadRows('category-with-post');

        $this->runYii($I, 'category/delete 1');

        $I->canSeeInShellOutput('[ERROR] There are posts with this category.');
        $I->seeInDatabase('category', ['id' => 1]);
    }
}
