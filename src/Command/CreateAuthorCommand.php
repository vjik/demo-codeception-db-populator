<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Yiisoft\Db\Connection\ConnectionInterface;
use Yiisoft\Yii\Console\ExitCode;

final class CreateAuthorCommand extends Command
{
    protected static $defaultName = 'author/create';
    protected static $defaultDescription = 'Create new author';

    public function __construct(
        private ConnectionInterface $db,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $name = (string) $input->getArgument('name');

        if (mb_strlen($name) < 3) {
            $io->error('Expected a name to contain at least 3 characters. Got: ' . $name);

            return ExitCode::DATAERR;
        }

        $this->db
            ->createCommand()
            ->insert('author', ['name' => $name])
            ->execute();

        $authorId = $this->db->getSchema()->getLastInsertID();

        $io->success('Created author ID ' . $authorId . '.');
        return ExitCode::OK;
    }
}
