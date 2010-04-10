<?php

class ActividadesAlumno extends Doctrine_Record
{

    public function setTableDefinition()
    {   
        $this->hasColumn('id_alumno', 'integer', 4, array(
            'primary' => true
        ));
        $this->hasColumn('id_actividad', 'integer', 4, array(
            'primary' => true
        ));
    }

    public function setUp()
    {
        $this->setTableName('actividades_alumno');

        $this->hasOne('Alumno as Alumno', array(
            'local' => 'id_alumno',
            'foreign' => 'id'
        ));

        $this->hasOne('Actividad as Actividad', array(
            'local' => 'id_actividad',
            'foreign' => 'id'
        ));
    }
}