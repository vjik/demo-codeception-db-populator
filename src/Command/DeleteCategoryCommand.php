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

final class DeleteCategoryCommand extends Command
{
    protected static $defaultName = 'category/delete';
    protected static $defaultDescription = 'Delete category';

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
            !(new Query($this->db))->from('category')->where(['id' => $id])->exists()
        ) {
            $io->error('Category with ID ' . $id . ' not found.');
            return ExitCode::DATAERR;
        }

        if (
            (new Query($this->db))->from('post')->where(['category_id' => $id])->exists()
        ) {
            $io->error('There are posts with this category.');
            return ExitCode::DATAERR;
        }

        $this->db
            ->createCommand()
            ->delete('category', ['id' => $id])
            ->execute();

        $io->success('Category ID ' . $id . ' deleted.');
        return ExitCode::OK;
    }
}
