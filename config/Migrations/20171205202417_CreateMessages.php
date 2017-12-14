<?php
use Migrations\AbstractMigration;

class CreateMessages extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('messages');
        $table->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('subject', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]); 
        $table->addColumn('type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ]);
        $table->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ]);
        $table->create();
    }
}
