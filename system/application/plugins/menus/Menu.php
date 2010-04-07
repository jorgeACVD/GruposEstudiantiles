<?php

/**
 * Requires helper url to be autoloaded.
 */
class Menu
{

    private $data = array();
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if(self::$instance == null)
        {
            self::$instance = new Menu();
        }

        return self::$instance;
    }

    public function loadMenuData($menuName, $iniFile)
    {
        $iniPath = 'configs/' . $iniFile . '.ini';

        // true to parse with "sections", so it creates multidimensional arrays
        $this->data[$menuName] = parse_ini_file($iniPath, true);
    }

    /**
     *
     * @param string $menuName The name of the menu we are referring to
     * @param string $index The index of the menu we are referring to
     */

    public function setCurrent($menuName, $index)
    {   
        if(array_key_exists($index, $this->data[$menuName]))
        {
            $this->data[$menuName][$index]['current'] = true;
        }
        else
        {
            throw new Exception('Index of Menu not defined');
        }
    }

    public function buildHtml($name)
    {
        $output = '<ul>';

        foreach($this->data[$name] as $item)
        {
            if(array_key_exists('current', $item) && $item['current'] == true)
            {
                $output .= '<li class="current">';
            }
            else
            {
                $output .= '<li>';
            }

            $output .= '<a href="'. base_url() . $item['controller'] .'/'. $item['action']. '">';
            $output .= $item['text'];
            $output .= '</a>';
            $output .= '</li>';
        }

        $output .= '</ul>';
        return $output;
    }

    public function isMenuDefined($menuName)
    {
        return array_key_exists($menuName, $this->data);
    }
}