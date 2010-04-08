<?php

class Actividad extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('descripcion', 'string', 100);
        $this->hasColumn('fecha_inicio', 'date');
        $this->hasColumn('fecha_fin', 'date');
    }

    public function setUp()
    {
        $this->setTableName('actividad');
    }
}