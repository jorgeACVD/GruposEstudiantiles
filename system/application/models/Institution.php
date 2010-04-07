<?php

class Institution extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('location_id', 'integer', 4);
        $this->hasColumn('name', 'string', 100, array(
            'unique' => true
        ));
        $this->hasColumn('short_name', 'string', 30, array(
            'unique' => true
        ));
        $this->hasColumn('url', 'string', 60);
        $this->hasColumn('telcode', 'string', 5);
        $this->hasColumn('tel1', 'string', 15);
        $this->hasColumn('tel2', 'string', 15, array(
            'notnull' => false
        ));
        $this->hasColumn('fax', 'string', 15, array(
            'notnull' => false
        ));
        $this->hasColumn('notes', 'string', 1000, array(
            'notnull' => false
        ));
    }

    public function setUp()
    {
        $this->setTableName('institution');
        $this->hasOne('Location', array(
            'local' => 'location_id',
            'foreign' => 'id'
        ));
        $this->hasMany('Entity as Entities', array(
            'local' => 'id',
            'foreign' => 'institution_id'
        ));
    }

}