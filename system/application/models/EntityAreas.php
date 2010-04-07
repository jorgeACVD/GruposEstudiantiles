<?php

class EntityAreas extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('entity_id', 'integer', 4);
        $this->hasColumn('sciencearea_id', 'integer', 4);
        $this->hasColumn('comments', 'string', 1000, array(
            'notnull' => false
        ));
    }

    public function setUp()
    {
        $this->setTableName('entity_areas');
        $this->hasOne('Sciencearea', array(
            'local' => 'sciencearea_id',
            'foreign' => 'id'
        ));

        $this->hasOne('Entity', array(
            'local' => 'entity_id',
            'foreign' => 'id'
        ));
    }

}