<?php
use Migrations\AbstractMigration;

class ReviewsMigrations extends AbstractMigration
{

    public function up()
    {

        $this->table('adrs')
            ->removeColumn('institution')
            ->update();

        $this->table('aefis')
            ->removeColumn('reporter_institution')
            ->update();

        $this->table('sadrs')
            ->removeColumn('age')
            ->update();

        $this->table('saefis')
            ->changeColumn('reference_number', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->update();

        $this->table('reviews')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => true,
            ])
            ->addColumn('comments', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('literature_review', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('references_text', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('adrs')
            ->addColumn('name_of_institution', 'string', [
                'after' => 'reporter_phone',
                'default' => null,
                'length' => 100,
                'null' => true,
            ])
            ->update();

        $this->table('notifications')
            ->addColumn('sender_id', 'integer', [
                'after' => 'user_id',
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('adrs')
            ->addColumn('institution', 'string', [
                'after' => 'reporter_phone',
                'default' => null,
                'length' => 100,
                'null' => true,
            ])
            ->removeColumn('name_of_institution')
            ->update();

        $this->table('aefis')
            ->addColumn('reporter_institution', 'string', [
                'after' => 'reporter_address',
                'default' => null,
                'length' => 200,
                'null' => false,
            ])
            ->update();

        $this->table('notifications')
            ->removeColumn('sender_id')
            ->update();

        $this->table('sadrs')
            ->addColumn('age', 'integer', [
                'after' => 'date_of_birth',
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->update();

        $this->table('saefis')
            ->changeColumn('reference_number', 'string', [
                'default' => null,
                'length' => 101,
                'null' => true,
            ])
            ->update();

        $this->dropTable('reviews');
    }
}

