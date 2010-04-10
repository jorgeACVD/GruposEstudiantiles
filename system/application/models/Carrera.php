<?php

class Carrera extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('nombre_corto', 'string', 100, array('unique' => true));
        $this->hasColumn('descripcion', 'string', 1000);
    }

    public function setUp()
    {
        $this->setTableName('carrera');
    }
}
