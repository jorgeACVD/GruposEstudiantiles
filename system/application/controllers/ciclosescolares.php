<?php

class Ciclosescolares extends Controller
{

    function Ciclosescolares()
    {
        parent::Controller();
        $this->load->helper(array('form'));
        
        $menu = Menu::getInstance();
        $menu->setCurrent('default', 'ciclosescolares');
    }

    function index()
    {
		$vars['view'] = 'home_index';
        $vars['title'] = 'Inicio';
        $this->load->view('template', $vars);
    }
}

/* End of file alumnos.php */
/* Location: ./system/application/controllers/alumnos.php */