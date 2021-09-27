<?php

declare(strict_types=1);

namespace App\Tests\Cli\Command;

use App\Tests\Cli\CliTest;
use App\Tests\CliTester;

final class CreatePostCommandCest extends CliTest
{
    function _before(CliTester $I)
    {
        $I->loadDump('all');
    }

    public function testCreate(CliTester $I): void
    {
        $this->runYii($I, 'post/create Hello');

        $I->canSeeInShellOutput('[OK] Created post ID 1.');
        $I->seeInDatabase('post', ['id' => 1, 'name' => 'Hello', 'author_id' => null, 'category_id' => null]);
    }

    public function testCreateWithAuthorAndCategory(CliTester $I): void
    {
        $I->loadRows('authors', 'categories');

        $this->runYii($I, 'post/create Hello --author 1 --category 2');

        $I->canSeeInShellOutput('[OK] Created post ID 1.');
        $I->seeInDatabase('post', ['id' => 1, 'name' => 'Hello', 'author_id' => 1, 'category_id' => 2]);
    }

    public function testShortName(CliTester $I): void
    {
        $this->runYii($I, 'post/create X');

        $I->canSeeInShellOutput('[ERROR] Expected a name to contain at least 3 characters. Got: X');
    }

    public function testNotExistAuthor(CliTester $I): void
    {
        $this->runYii($I, 'post/create Hello --author 1');

        $I->canSeeInShellOutput('[ERROR] Author with ID 1 not found.');
    }

    public function testNotExistCategory(CliTester $I): void
    {
        $this->runYii($I, 'post/create Hello --category 1');

        $I->canSeeInShellOutput('[ERROR] Category with ID 1 not found.');
    }
}
