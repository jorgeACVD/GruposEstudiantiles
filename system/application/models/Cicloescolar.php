<?php

class Cicloescolar extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('periodo', 'string', 100);
        $this->hasColumn('fecha_inicio', 'date');
        $this->hasColumn('fecha_fin', 'date');
    }

    public function setUp()
    {
        $this->setTableName('cicloescolar');
    }
}