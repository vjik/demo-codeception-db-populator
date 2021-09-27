<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Vjik\SimpleTypeCaster\TypeCaster;
use Yiisoft\Db\Connection\ConnectionInterface;
use Yiisoft\Db\Query\Query;
use Yiisoft\Yii\Console\ExitCode;

final class CreatePostCommand extends Command
{
    protected static $defaultName = 'post/create';
    protected static $defaultDescription = 'Create new post';

    public function __construct(
        private ConnectionInterface $db,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('name', InputArgument::REQUIRED);
        $this->addOption('author', 'a', InputArgument::OPTIONAL);
        $this->addOption('category', 'c', InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $name = (string) $input->getArgument('name');
        $authorId = TypeCaster::toIntOrNull($input->getOption('author'));
        $categoryId = TypeCaster::toIntOrNull($input->getOption('category'));

        if (mb_strlen($name) < 3) {
            $io->error('Expected a name to contain at least 3 characters. Got: ' . $name);
            return ExitCode::DATAERR;
        }

        if (
            $authorId !== null &&
            !(new Query($this->db))->from('author')->where(['id' => $authorId])->exists()
        ) {
            $io->error('Author with ID ' . $authorId . ' not found.');
            return ExitCode::DATAERR;
        }

        if (
            $categoryId !== null &&
            !(new Query($this->db))->from('category')->where(['id' => $categoryId])->exists()
        ) {
            $io->error('Category with ID ' . $categoryId . ' not found.');
            return ExitCode::DATAERR;
        }

        $this->db
            ->createCommand()
            ->insert('post', ['name' => $name, 'author_id' => $authorId, 'category_id' => $categoryId])
            ->execute();

        $postId = $this->db->getSchema()->getLastInsertID();

        $io->success('Created post ID ' . $postId . '.');
        return ExitCode::OK;
    }
}
