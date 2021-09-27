<?php

declare(strict_types=1);

namespace App\Tests\Cli\Command;

use App\Tests\Cli\CliTest;
use App\Tests\CliTester;

final class DeleteAuthorCommandCest extends CliTest
{
    function _before(CliTester $I)
    {
        $I->loadDump('author', 'post');
    }

    public function testDelete(CliTester $I): void
    {
        $I->loadRows('authors');

        $this->runYii($I, 'author/delete 1');

        $I->canSeeInShellOutput('[OK] Author ID 1 deleted.');
        $I->dontSeeInDatabase('author', ['id' => 1]);
        $I->seeInDatabase('author', ['id' => 2]);
    }

    public function testNotExist(CliTester $I): void
    {
        $this->runYii($I, 'author/delete 1');

        $I->canSeeInShellOutput('[ERROR] Author with ID 1 not found.');
    }

    public function testWithExistPost(CliTester $I): void
    {
        $I->loadRows('author-with-post');

        $this->runYii($I, 'author/delete 1');

        $I->canSeeInShellOutput('[ERROR] There are posts with this author.');
        $I->seeInDatabase('author', ['id' => 1]);
    }
}
