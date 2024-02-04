<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVisitorIps extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('visitor_ips');
        $table->addColumn('ip_address', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('visit_time', 'timestamp', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
