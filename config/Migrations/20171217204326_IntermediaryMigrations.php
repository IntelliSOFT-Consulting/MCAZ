<?php
use Migrations\AbstractMigration;

class IntermediaryMigrations extends AbstractMigration
{

    public function up()
    {

        $this->table('sadrs')
            ->changeColumn('status', 'string', [
                'default' => 'UnSubmitted',
                'limit' => 255,
                'null' => true,
            ])
            ->update();

        $this->table('adrs')
            ->addColumn('submitted_date', 'date', [
                'after' => 'submitted',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('status', 'string', [
                'after' => 'submitted_date',
                'default' => 'UnSubmitted',
                'length' => 255,
                'null' => true,
            ])
            ->update();

        $this->table('aefi_list_of_vaccines')
            ->addColumn('diluent_batch_number', 'string', [
                'after' => 'expiry_date',
                'default' => null,
                'length' => 55,
                'null' => true,
            ])
            ->addColumn('diluent_date', 'datetime', [
                'after' => 'diluent_batch_number',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('diluent_expiry_date', 'date', [
                'after' => 'diluent_date',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('aefis')
            ->addColumn('aefi_id', 'integer', [
                'after' => 'user_id',
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->addColumn('submitted_date', 'date', [
                'after' => 'submitted',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('status', 'string', [
                'after' => 'submitted_date',
                'default' => 'UnSubmitted',
                'length' => 255,
                'null' => true,
            ])
            ->update();

        $this->table('reviews')
            ->addColumn('category', 'string', [
                'after' => 'foreign_key',
                'default' => null,
                'length' => 55,
                'null' => true,
            ])
            ->addColumn('file', 'string', [
                'after' => 'references_text',
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->addColumn('dir', 'string', [
                'after' => 'file',
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->addColumn('size', 'string', [
                'after' => 'dir',
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->addColumn('type', 'string', [
                'after' => 'size',
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->update();

        $this->table('sadrs')
            ->addColumn('sadr_id', 'integer', [
                'after' => 'user_id',
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->update();

        $this->table('saefis')
            ->addColumn('submitted_date', 'date', [
                'after' => 'submitted',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('status', 'string', [
                'after' => 'submitted_date',
                'default' => 'UnSubmitted',
                'length' => 255,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('adrs')
            ->removeColumn('submitted_date')
            ->removeColumn('status')
            ->update();

        $this->table('aefi_list_of_vaccines')
            ->removeColumn('diluent_batch_number')
            ->removeColumn('diluent_date')
            ->removeColumn('diluent_expiry_date')
            ->update();

        $this->table('aefis')
            ->removeColumn('aefi_id')
            ->removeColumn('submitted_date')
            ->removeColumn('status')
            ->update();

        $this->table('reviews')
            ->removeColumn('category')
            ->removeColumn('file')
            ->removeColumn('dir')
            ->removeColumn('size')
            ->removeColumn('type')
            ->update();

        $this->table('sadrs')
            ->changeColumn('status', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->removeColumn('sadr_id')
            ->update();

        $this->table('saefis')
            ->removeColumn('submitted_date')
            ->removeColumn('status')
            ->update();
    }
}

