<?php

class Equipment extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('lab_id', 'integer', 4);
        $this->hasColumn('name', 'string', 100, array(
            'unique' => true
        ));
        $this->hasColumn('description', 'string', 1000, array(
            'notnull' => false
        ));
        $this->hasColumn('exclusive_use', 'integer', 1);
        $this->hasColumn('notes', 'string', 1000, array(
            'notnull' => false
        ));
    }

    public function setUp()
    {
        $this->setTableName('equipment');
        $this->hasOne('Lab', array(
            'local' => 'lab_id',
            'foreign' => 'id'
        ));
    }

}