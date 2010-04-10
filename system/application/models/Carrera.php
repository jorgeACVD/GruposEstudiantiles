<?php

class Carrera extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('nombre', 'string', 100);
        $this->hasColumn('nombre_corto', 'string', 100, array('unique' => true));
    }

    public function setUp()
    {
        $this->setTableName('carrera');
    }
}
