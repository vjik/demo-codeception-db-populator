<?php

declare(strict_types=1);

namespace App\Tests\Cli\Command;

use App\Tests\Cli\CliTest;
use App\Tests\CliTester;

final class DeletePostCommandCest extends CliTest
{
    function _before(CliTester $I)
    {
        $I->loadDump('post');
    }

    public function testDelete(CliTester $I): void
    {
        $I->loadRows('posts');

        $this->runYii($I, 'post/delete 1');

        $I->canSeeInShellOutput('[OK] Post ID 1 deleted.');
        $I->dontSeeInDatabase('post', ['id' => 1]);
        $I->seeInDatabase('post', ['id' => 2]);
    }

    public function testNotExist(CliTester $I): void
    {
        $this->runYii($I, 'post/delete 1');

        $I->canSeeInShellOutput('[ERROR] Post with ID 1 not found.');
    }
}
