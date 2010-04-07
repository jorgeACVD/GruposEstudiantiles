<?php

class Location extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('street', 'string', 100);
        $this->hasColumn('number', 'string', 10);
        $this->hasColumn('colonia', 'string', 45, array(
            'notnull' => false
        ));
        $this->hasColumn('municipio', 'string', 45);
        $this->hasColumn('cp', 'string', 15, array(
            'notnull' => false
        ));
    }

    public function setUp()
    {
        $this->setTableName('location');
    }

}