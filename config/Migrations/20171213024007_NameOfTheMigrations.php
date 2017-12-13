<?php
use Migrations\AbstractMigration;

class NameOfTheMigrations extends AbstractMigration
{

    public function up()
    {

        $this->table('sadrs')
            ->addColumn('assigned_to', 'integer', [
                'after' => 'user_id',
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->addColumn('assigned_by', 'integer', [
                'after' => 'assigned_to',
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->addColumn('assigned_date', 'datetime', [
                'after' => 'assigned_by',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('province_id', 'integer', [
                'after' => 'assigned_date',
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->addColumn('submitted_date', 'datetime', [
                'after' => 'submitted',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('status', 'string', [
                'after' => 'submitted_date',
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('sadrs')
            ->removeColumn('assigned_to')
            ->removeColumn('assigned_by')
            ->removeColumn('assigned_date')
            ->removeColumn('province_id')
            ->removeColumn('submitted_date')
            ->removeColumn('status')
            ->update();
    }
}

