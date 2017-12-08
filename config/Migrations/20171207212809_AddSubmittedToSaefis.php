<?php
use Migrations\AbstractMigration;

class AddSubmittedToSaefis extends AbstractMigration
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
        $table = $this->table('saefis');
        $table->addColumn('submitted', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => null,
        ]);
        $table->update();
    }
}
