<?php

class Doctrine_Tools extends Controller
{
    function create_tables()
    {
        Doctrine::createTablesFromModels();
        echo "Tables created<br />";
    }

    function drop_tables()
    {
        $connection = Doctrine_Manager::getInstance()->getConnection('default');
        $connection->dropDatabase();
        $connection->createDatabase();
        echo "Tables dropped<br />";
    }

    function load_data()
    {
        Doctrine_Core::loadData(APPPATH . 'models/fixtures/');
        echo "Data loaded<br />";
    }

    function batch()
    {
        $this->drop_tables();
        $this->create_tables();
        $this->load_data();
    }
}
