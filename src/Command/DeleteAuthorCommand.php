<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Yiisoft\Db\Connection\ConnectionInterface;
use Yiisoft\Db\Query\Query;
use Yiisoft\Yii\Console\ExitCode;

final class DeleteAuthorCommand extends Command
{
    protected static $defaultName = 'author/delete';
    protected static $defaultDescription = 'Delete author';

    public function __construct(
        private ConnectionInterface $db,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('id', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $id = (int) $input->getArgument('id');

        if (
            !(new Query($this->db))->from('author')->where(['id' => $id])->exists()
        ) {
            $io->error('Author with ID ' . $id . ' not found.');
            return ExitCode::DATAERR;
        }

        if (
            (new Query($this->db))->from('post')->where(['author_id' => $id])->exists()
        ) {
            $io->error('There are posts with this author.');
            return ExitCode::DATAERR;
        }

        $this->db
            ->createCommand()
            ->delete('author', ['id' => $id])
            ->execute();

        $io->success('Author ID ' . $id . ' deleted.');
        return ExitCode::OK;
    }
}
