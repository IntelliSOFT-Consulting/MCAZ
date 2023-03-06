<?php

use Migrations\AbstractMigration;

class CreateTechnical extends AbstractMigration
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
        $table = $this->table('technical');
        $table
            ->addColumn('name', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'limit' => 255,
                'null' => true,
                'default' => ''
            ])
            // Add any other columns
            ->create();
    }
}
