<?php

class Alumno extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('matricula', 'string', 100, array('unique' => true));
        $this->hasColumn('nombre', 'string', 100);
        $this->hasColumn('apellido', 'string', 100);
        $this->hasColumn('semestre', 'integer', 4);
    }

    public function setUp()
    {
        $this->setTableName('alumno');
    }
}