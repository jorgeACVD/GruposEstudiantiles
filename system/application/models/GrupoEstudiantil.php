<?php

class Grupoestudiantil extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('nombre', 'string', 100, array('unique' => true));
        $this->hasColumn('descripcion', 'string', 1000);
        $this->hasColumn('estado', 'string', 100);
    }

    public function setUp()
    {
        $this->setTableName('grupoestudiantil');
    }
}