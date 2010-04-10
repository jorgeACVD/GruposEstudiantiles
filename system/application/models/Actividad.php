<?php

class Actividad extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('id_cicloescolar', 'integer', 4);
        $this->hasColumn('id_grupoestudiantil', 'integer', 4);
        $this->hasColumn('descripcion', 'string', 100);
        $this->hasColumn('fecha_inicio', 'date');
        $this->hasColumn('fecha_fin', 'date');
    }

    public function setUp()
    {
        $this->setTableName('actividad');

        $this->hasOne('Cicloescolar', array(
           'local' => 'id_cicloescolar',
           'foreign' => 'id'
        ));

        $this->hasOne('Grupoestudiantil', array(
            'local' => 'id_grupoestudiantil',
            'foreign' => 'id'
        ));

        $this->hasMany('ActividadesAlumno as Alumnos', array(
            'local' => 'id',
            'foreign' => 'id_alumno'
        ));
    }
}