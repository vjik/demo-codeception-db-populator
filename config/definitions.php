<?php

declare(strict_types=1);

use App\Command\CreateAuthorCommand;
use App\Command\CreateCategoryCommand;
use App\Command\CreatePostCommand;
use App\Command\DeleteAuthorCommand;
use App\Command\DeleteCategoryCommand;
use App\Command\DeletePostCommand;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Symfony\Component\Console\CommandLoader\CommandLoaderInterface;
use Yiisoft\Db\Connection\ConnectionInterface;
use Yiisoft\Db\Mysql\Connection;
use Yiisoft\Definitions\Reference;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiisoft\Yii\Console\Application;
use Yiisoft\Yii\Console\CommandLoader;
use Yiisoft\Yii\Console\SymfonyEventDispatcher;
use Yiisoft\Yii\Db\Migration\Command\CreateCommand;
use Yiisoft\Yii\Db\Migration\Command\DownCommand;
use Yiisoft\Yii\Db\Migration\Command\HistoryCommand;
use Yiisoft\Yii\Db\Migration\Command\ListTablesCommand;
use Yiisoft\Yii\Db\Migration\Command\NewCommand;
use Yiisoft\Yii\Db\Migration\Command\RedoCommand;
use Yiisoft\Yii\Db\Migration\Command\UpdateCommand;
use Yiisoft\Yii\Db\Migration\Informer\ConsoleMigrationInformer;
use Yiisoft\Yii\Db\Migration\Informer\MigrationInformerInterface;
use Yiisoft\Yii\Db\Migration\Service\MigrationService;

return [
    // Yii Console
    CommandLoaderInterface::class => [
        'class' => CommandLoader::class,
        '__construct()' => [
            'commandMap' => [
                'author/create' => CreateAuthorCommand::class,
                'author/delete' => DeleteAuthorCommand::class,

                'category/create' => CreateCategoryCommand::class,
                'category/delete' => DeleteCategoryCommand::class,

                'post/create' => CreatePostCommand::class,
                'post/delete' => DeletePostCommand::class,

                'migrate/create' => CreateCommand::class,
                'database/list' => ListTablesCommand::class,
                'migrate/down' => DownCommand::class,
                'migrate/history' => HistoryCommand::class,
                'migrate/new' => NewCommand::class,
                'migrate/redo' => RedoCommand::class,
                'migrate/up' => UpdateCommand::class,
            ],
        ],
    ],
    Application::class => [
        '__construct()' => [
            'Yii Console',
            '1.0',
        ],
        'setDispatcher()' => [Reference::to(SymfonyEventDispatcher::class)],
        'setCommandLoader()' => [Reference::to(CommandLoaderInterface::class)],
    ],

    // Yii DB
    ConnectionInterface::class => [
        'class' => Connection::class,
        '__construct()' => [
            'dsn' => 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
        ],
        'setUsername()' => [$_ENV['DB_USERNAME']],
        'setPassword()' => [$_ENV['DB_PASSWORD']],
    ],

    // Yii DB Migration
    MigrationInformerInterface::class => ConsoleMigrationInformer::class,
    MigrationService::class => [
        'createNamespace()' => ['App\\Migration'],
        'updateNamespaces()' => [['App\\Migration']],
        'createPath()' => [''],
        'updatePaths()' => [[]],
    ],

    // Yii Event
    EventDispatcherInterface::class => Dispatcher::class,
    ListenerProviderInterface::class => Provider::class,

    // Yii Cache
    \Yiisoft\Cache\CacheInterface::class => \Yiisoft\Cache\Cache::class,
    \Psr\SimpleCache\CacheInterface::class => \Yiisoft\Cache\ArrayCache::class,
];
