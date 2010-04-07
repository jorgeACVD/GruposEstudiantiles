<?php

require_once APPPATH . 'plugins/menus/Menu.php';

// initialize the default menu, it will be shown everywhere
Menu::getInstance()->loadMenuData('default', 'default');