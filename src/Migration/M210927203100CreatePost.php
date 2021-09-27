<?php

declare(strict_types=1);

namespace App\Migration;

use Yiisoft\Yii\Db\Migration\MigrationBuilder;
use Yiisoft\Yii\Db\Migration\RevertibleMigrationInterface;

final class M210927203100CreatePost implements RevertibleMigrationInterface
{
    public function up(MigrationBuilder $b): void
    {
        $b->createTable('post', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'author_id' => 'INT(11) UNSIGNED',
            'category_id' => 'INT(11) UNSIGNED',
            'name' => 'VARCHAR(100)',
        ]);
    }

    public function down(MigrationBuilder $b): void
    {
        $b->dropTable('post');
    }
}
