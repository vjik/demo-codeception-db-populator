<?php

declare(strict_types=1);

namespace App\Migration;

use Yiisoft\Yii\Db\Migration\MigrationBuilder;
use Yiisoft\Yii\Db\Migration\RevertibleMigrationInterface;

final class M210927202953CreateCategory implements RevertibleMigrationInterface
{
    public function up(MigrationBuilder $b): void
    {
        $b->createTable('category', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'VARCHAR(100)',
        ]);
    }

    public function down(MigrationBuilder $b): void
    {
        $b->dropTable('category');
    }
}
