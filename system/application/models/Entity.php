<?php

class Entity extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('institution_id', 'integer', 4);
        $this->hasColumn('location_id', 'integer', 4);
        $this->hasColumn('name', 'string', 100, array(
            'unique' => true
        ));
        $this->hasColumn('url', 'string', 60, array(
            'notnull' => false
        ));
        $this->hasColumn('director_name', 'string', 100);
        $this->hasColumn('director_email', 'string', 60);
        $this->hasColumn('telcode', 'string', 5);
        $this->hasColumn('tel1', 'string', 15);
        $this->hasColumn('tel2', 'string', 15, array(
            'notnull' => false
        ));
        $this->hasColumn('fax', 'string', 15, array(
            'notnull' => false
        ));
        $this->hasColumn('contact_name', 'string', 100);
        $this->hasColumn('contact_email', 'string', 60);
        $this->hasColumn('contact_department', 'string', 60, array(
            'notnull' => false
        ));
        $this->hasColumn('researchers', 'integer', 4, array(
            'notnull' => false
        ));
        $this->hasColumn('professors', 'integer', 4, array(
            'notnull' => false
        ));
        $this->hasColumn('extensionists', 'integer', 4, array(
            'notnull' => false
        ));
        $this->hasColumn('professors_extensionists', 'integer', 4, array(
            'notnull' => false
        ));
        $this->hasColumn('professors_researchers', 'integer', 4, array(
            'notnull' => false
        ));
        $this->hasColumn('researchers_sni', 'integer', 4, array(
            'notnull' => false
        ));
        $this->hasColumn('notes', 'string', 1000, array(
            'notnull' => false
        ));
    }

    public function setUp()
    {
        $this->setTableName('entity');
        $this->hasOne('Location', array(
            'local' => 'location_id',
            'foreign' => 'id'
        ));
        $this->hasOne('Institution', array(
            'local' => 'institution_id',
            'foreign' => 'id'
        ));
        $this->hasMany('EntityAreas as Areas', array(
            'local' => 'id',
            'foreign' => 'entity_id'
        ));
        $this->hasMany('Lab as Labs', array(
            'local' => 'id',
            'foreign' => 'entity_id'
        ));
    }

}