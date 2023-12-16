<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTaskTableMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('tasks');

        $table->addColumn('complated', 'timestamp')
            ->addColumn('username', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('description', 'text', ['null' => false])
            ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => false])
            ->addColumn('description_updated', 'timestamp');

        $table->addIndex(['complated'])
            ->addIndex(['username'])
            ->addIndex(['email']);

        $table->create();
    }
}
