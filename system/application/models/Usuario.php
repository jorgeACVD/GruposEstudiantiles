<?php

class Usuario extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->hasColumn('usuario', 'string', 100, array('unique' => true));
        $this->hasColumn('password', 'string', 40);
        $this->hasColumn('tipo', 'string', 10, array('unique' => true));
    }

    public function setUp()
    {
        $this->setTableName('usuario');
    }
}