<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();
        $this->load->helper(array('form'));
        
        $menu = Menu::getInstance();
        $menu->setCurrent('default', 'inicio');
	}

	function index()
	{
		$vars['view'] = 'home_index';
        $vars['title'] = 'Inicio';
        $this->load->view('template', $vars);
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */