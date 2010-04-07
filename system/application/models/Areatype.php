<?php

class Areatype extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('name', 'string', 100, array('unique' => true));
    }

    public function setUp()
    {
        $this->setTableName('areatype');
    }
}