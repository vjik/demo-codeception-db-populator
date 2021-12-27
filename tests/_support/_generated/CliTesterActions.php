<?php  //[STAMP] d60c3ec247df433c08ebca573e61b344
namespace App\Tests\_generated;

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile

trait CliTesterActions
{
    /**
     * @return \Codeception\Scenario
     */
    abstract protected function getScenario();

    
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Executes a shell command.
     * Fails if exit code is > 0. You can disable this by passing `false` as second argument
     *
     * ```php
     * <?php
     * $I->runShellCommand('phpunit');
     *
     * // do not fail test when command fails
     * $I->runShellCommand('phpunit', false);
     * ```
     * @see \Codeception\Module\Cli::runShellCommand()
     */
    public function runShellCommand(string $command, bool $failNonZero = true): void {
        $this->getScenario()->runStep(new \Codeception\Step\Action('runShellCommand', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that output from last executed command contains text
     * @see \Codeception\Module\Cli::seeInShellOutput()
     */
    public function seeInShellOutput(string $text): void {
        $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeInShellOutput', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     * Checks that output from last executed command contains text
     * @see \Codeception\Module\Cli::seeInShellOutput()
     */
    public function canSeeInShellOutput(string $text): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeInShellOutput', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that output from latest command doesn't contain text
     * @see \Codeception\Module\Cli::dontSeeInShellOutput()
     */
    public function dontSeeInShellOutput(string $text): void {
        $this->getScenario()->runStep(new \Codeception\Step\Action('dontSeeInShellOutput', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     * Checks that output from latest command doesn't contain text
     * @see \Codeception\Module\Cli::dontSeeInShellOutput()
     */
    public function cantSeeInShellOutput(string $text): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('dontSeeInShellOutput', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     *
     * @see \Codeception\Module\Cli::seeShellOutputMatches()
     */
    public function seeShellOutputMatches(string $regex): void {
        $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeShellOutputMatches', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     *
     * @see \Codeception\Module\Cli::seeShellOutputMatches()
     */
    public function canSeeShellOutputMatches(string $regex): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeShellOutputMatches', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Returns the output from latest command
     * @see \Codeception\Module\Cli::grabShellOutput()
     */
    public function grabShellOutput(): string {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('grabShellOutput', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks result code. To verify a result code > 0, you need to pass `false` as second argument to `runShellCommand()`
     *
     * ```php
     * <?php
     * $I->seeResultCodeIs(0);
     * ```
     * @see \Codeception\Module\Cli::seeResultCodeIs()
     */
    public function seeResultCodeIs(int $code): void {
        $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeResultCodeIs', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     * Checks result code. To verify a result code > 0, you need to pass `false` as second argument to `runShellCommand()`
     *
     * ```php
     * <?php
     * $I->seeResultCodeIs(0);
     * ```
     * @see \Codeception\Module\Cli::seeResultCodeIs()
     */
    public function canSeeResultCodeIs(int $code): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeResultCodeIs', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks result code
     *
     * ```php
     * <?php
     * $I->seeResultCodeIsNot(0);
     * ```
     * @see \Codeception\Module\Cli::seeResultCodeIsNot()
     */
    public function seeResultCodeIsNot(int $code): void {
        $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeResultCodeIsNot', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     * Checks result code
     *
     * ```php
     * <?php
     * $I->seeResultCodeIsNot(0);
     * ```
     * @see \Codeception\Module\Cli::seeResultCodeIsNot()
     */
    public function canSeeResultCodeIsNot(int $code): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeResultCodeIsNot', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Make sure you are connected to the right database.
     *
     * ```php
     * <?php
     * $I->seeNumRecords(2, 'users');   //executed on default database
     * $I->amConnectedToDatabase('db_books');
     * $I->seeNumRecords(30, 'books');  //executed on db_books database
     * //All the next queries will be on db_books
     * ```
     *
     * @throws ModuleConfigException
     * @see \Codeception\Module\Db::amConnectedToDatabase()
     */
    public function amConnectedToDatabase(string $databaseKey): void {
        $this->getScenario()->runStep(new \Codeception\Step\Condition('amConnectedToDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Can be used with a callback if you don't want to change the current database in your test.
     *
     * ```php
     * <?php
     * $I->seeNumRecords(2, 'users');   //executed on default database
     * $I->performInDatabase('db_books', function($I) {
     *     $I->seeNumRecords(30, 'books');  //executed on db_books database
     * });
     * $I->seeNumRecords(2, 'users');  //executed on default database
     * ```
     * List of actions can be pragmatically built using `Codeception\Util\ActionSequence`:
     *
     * ```php
     * <?php
     * $I->performInDatabase('db_books', ActionSequence::build()
     *     ->seeNumRecords(30, 'books')
     * );
     * ```
     * Alternatively an array can be used:
     *
     * ```php
     * $I->performInDatabase('db_books', ['seeNumRecords' => [30, 'books']]);
     * ```
     *
     * Choose the syntax you like the most and use it,
     *
     * Actions executed from array or ActionSequence will print debug output for actions, and adds an action name to
     * exception on failure.
     *
     * @param $databaseKey
     * @param ActionSequence|array|callable $actions
     * @throws ModuleConfigException
     * @see \Codeception\Module\Db::performInDatabase()
     */
    public function performInDatabase($databaseKey, $actions): void {
        $this->getScenario()->runStep(new \Codeception\Step\Action('performInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Inserts an SQL record into a database. This record will be erased after the test.
     *
     * ```php
     * <?php
     * $I->haveInDatabase('users', array('name' => 'miles', 'email' => 'miles@davis.com'));
     * ```
     * @see \Codeception\Module\Db::haveInDatabase()
     */
    public function haveInDatabase(string $table, array $data): int {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('haveInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Asserts that a row with the given column values exists.
     * Provide table name and column values.
     *
     * ```php
     * <?php
     * $I->seeInDatabase('users', ['name' => 'Davert', 'email' => 'davert@mail.com']);
     * ```
     * Fails if no such user found.
     *
     * Comparison expressions can be used as well:
     *
     * ```php
     * <?php
     * $I->seeInDatabase('posts', ['num_comments >=' => '0']);
     * $I->seeInDatabase('users', ['email like' => 'miles@davis.com']);
     * ```
     *
     * Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.
     * @see \Codeception\Module\Db::seeInDatabase()
     */
    public function seeInDatabase(string $table, array $criteria = []): void {
        $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeInDatabase', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     * Asserts that a row with the given column values exists.
     * Provide table name and column values.
     *
     * ```php
     * <?php
     * $I->seeInDatabase('users', ['name' => 'Davert', 'email' => 'davert@mail.com']);
     * ```
     * Fails if no such user found.
     *
     * Comparison expressions can be used as well:
     *
     * ```php
     * <?php
     * $I->seeInDatabase('posts', ['num_comments >=' => '0']);
     * $I->seeInDatabase('users', ['email like' => 'miles@davis.com']);
     * ```
     *
     * Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.
     * @see \Codeception\Module\Db::seeInDatabase()
     */
    public function canSeeInDatabase(string $table, array $criteria = []): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Asserts that the given number of records were found in the database.
     *
     * ```php
     * <?php
     * $I->seeNumRecords(1, 'users', ['name' => 'davert'])
     * ```
     *
     * @param int $expectedNumber Expected number
     * @param string $table Table name
     * @param array $criteria Search criteria [Optional]
     * @see \Codeception\Module\Db::seeNumRecords()
     */
    public function seeNumRecords(int $expectedNumber, string $table, array $criteria = []): void {
        $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeNumRecords', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     * Asserts that the given number of records were found in the database.
     *
     * ```php
     * <?php
     * $I->seeNumRecords(1, 'users', ['name' => 'davert'])
     * ```
     *
     * @param int $expectedNumber Expected number
     * @param string $table Table name
     * @param array $criteria Search criteria [Optional]
     * @see \Codeception\Module\Db::seeNumRecords()
     */
    public function canSeeNumRecords(int $expectedNumber, string $table, array $criteria = []): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeNumRecords', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Effect is opposite to ->seeInDatabase
     *
     * Asserts that there is no record with the given column values in a database.
     * Provide table name and column values.
     *
     * ``` php
     * <?php
     * $I->dontSeeInDatabase('users', ['name' => 'Davert', 'email' => 'davert@mail.com']);
     * ```
     * Fails if such user was found.
     *
     * Comparison expressions can be used as well:
     *
     * ```php
     * <?php
     * $I->dontSeeInDatabase('posts', ['num_comments >=' => '0']);
     * $I->dontSeeInDatabase('users', ['email like' => 'miles%']);
     * ```
     *
     * Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.
     * @see \Codeception\Module\Db::dontSeeInDatabase()
     */
    public function dontSeeInDatabase(string $table, array $criteria = []): void {
        $this->getScenario()->runStep(new \Codeception\Step\Action('dontSeeInDatabase', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * [!] Conditional Assertion: Test won't be stopped on fail
     * Effect is opposite to ->seeInDatabase
     *
     * Asserts that there is no record with the given column values in a database.
     * Provide table name and column values.
     *
     * ``` php
     * <?php
     * $I->dontSeeInDatabase('users', ['name' => 'Davert', 'email' => 'davert@mail.com']);
     * ```
     * Fails if such user was found.
     *
     * Comparison expressions can be used as well:
     *
     * ```php
     * <?php
     * $I->dontSeeInDatabase('posts', ['num_comments >=' => '0']);
     * $I->dontSeeInDatabase('users', ['email like' => 'miles%']);
     * ```
     *
     * Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.
     * @see \Codeception\Module\Db::dontSeeInDatabase()
     */
    public function cantSeeInDatabase(string $table, array $criteria = []): void {
        $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('dontSeeInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Fetches all values from the column in database.
     * Provide table name, desired column and criteria.
     *
     * ``` php
     * <?php
     * $mails = $I->grabColumnFromDatabase('users', 'email', array('name' => 'RebOOter'));
     * ```
     * @see \Codeception\Module\Db::grabColumnFromDatabase()
     */
    public function grabColumnFromDatabase(string $table, string $column, array $criteria = []): array {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('grabColumnFromDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Fetches a single column value from a database.
     * Provide table name, desired column and criteria.
     *
     * ``` php
     * <?php
     * $mail = $I->grabFromDatabase('users', 'email', array('name' => 'Davert'));
     * ```
     * Comparison expressions can be used as well:
     *
     * ```php
     * <?php
     * $post = $I->grabFromDatabase('posts', ['num_comments >=' => 100]);
     * $user = $I->grabFromDatabase('users', ['email like' => 'miles%']);
     * ```
     *
     * Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.
     *
     * @return mixed Returns a single column value or false
     * @see \Codeception\Module\Db::grabFromDatabase()
     */
    public function grabFromDatabase(string $table, string $column, array $criteria = []) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('grabFromDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Returns the number of rows in a database
     *
     * @param string $table    Table name
     * @param array  $criteria Search criteria [Optional]
     * @return int
     * @see \Codeception\Module\Db::grabNumRecords()
     */
    public function grabNumRecords(string $table, array $criteria = []): int {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('grabNumRecords', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Update an SQL record into a database.
     *
     * ```php
     * <?php
     * $I->updateInDatabase('users', array('isAdmin' => true), array('email' => 'miles@davis.com'));
     * ```
     * @see \Codeception\Module\Db::updateInDatabase()
     */
    public function updateInDatabase(string $table, array $data, array $criteria = []): void {
        $this->getScenario()->runStep(new \Codeception\Step\Action('updateInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     *
     * @see \Vjik\Codeception\DatabasePopulator\Module::loadDump()
     */
    public function loadDump(string $dumps = ''): void {
        $this->getScenario()->runStep(new \Codeception\Step\Action('loadDump', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     *
     * @see \Vjik\Codeception\DatabasePopulator\Module::loadRows()
     */
    public function loadRows(string $sets = ''): void {
        $this->getScenario()->runStep(new \Codeception\Step\Action('loadRows', func_get_args()));
    }
}
