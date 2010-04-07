<?php

class Lab extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('entity_id', 'integer', 4);
        $this->hasColumn('name', 'string', 100, array(
            'unique' => true
        ));
        $this->hasColumn('description', 'string', 1000);
        $this->hasColumn('exclusive_use', 'integer', 1);
        $this->hasColumn('notes', 'integer', 1000, array(
            'notnull' => false
        ));
    }

    public function setUp()
    {
        $this->setTableName('lab');
        $this->hasOne('Entity', array(
            'local' => 'entity_id',
            'foreign' => 'id'
        ));
    }

}