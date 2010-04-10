<?php

class Alumno extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('id_carrera', 'integer', 4);
        $this->hasColumn('matricula', 'string', 100, array('unique' => true));
        $this->hasColumn('nombre', 'string', 100);
        $this->hasColumn('apellido', 'string', 100);
        $this->hasColumn('semestre', 'integer', 4);
    }

    public function setUp()
    {
        $this->setTableName('alumno');
        
        $this->hasOne('Carrera', array(
            'local' => 'id_carrera',
            'foreign' => 'id'
        ));

        $this->hasMany('ActividadesAlumno as Actividades', array(
            'local' => 'id',
            'foreign' => 'id_alumno'
        ));
    }
}