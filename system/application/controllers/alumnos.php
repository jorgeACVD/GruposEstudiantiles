<?php

class Alumnos extends Controller
{

    function Alumnos()
    {
        parent::Controller();
        $this->load->helper(array('form'));
        
        $menu = Menu::getInstance();
        $menu->setCurrent('default', 'alumnos');
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