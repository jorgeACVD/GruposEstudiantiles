<?php

class Sciencearea extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('areatype_id', 'integer', 4);
        $this->hasColumn('name', 'string', 100, array(
            'unique' => true
        ));
        $this->hasColumn('description', 'string', 1000, array(
            'notnull' => false
        ));
    }

    public function setUp()
    {
        $this->setTableName('sciencearea');
        $this->hasOne('Areatype', array(
            'local' => 'areatype_id',
            'foreign' => 'id'
        ));
    }

}