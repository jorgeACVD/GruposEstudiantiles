<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
* CodeIgniter
*
* An open source application development framework for PHP 4.3.2 or newer
*
* @package        CodeIgniter
* @author        Rick Ellis
* @copyright    Copyright (c) 2006, EllisLab, Inc.
* @license        http://www.codeignitor.com/user_guide/license.html
* @link        http://www.codeigniter.com
* @since        Version 1.0
* @filesource
*/

// ------------------------------------------------------------------------

/**
* CodeIgniter JLoad v1.0
*
* This library lets you specify what Javascript files to include in your view.
*
* - Filenames can be passed as either an array
*                 $this->jload->add(array('script1', 'script2'));
*      or individually.
*                 $this->jload->add('script1', 'script2');
*   you can also add a group defined in the jload config
*                 $this->jload->group('group_name');
*   Then the tags are built with
*                 $data['javascript'] = $this->jload->generate();
*
*
* @package        CodeIgniter
* @subpackage    Libraries
* @category    Javascript Loader
* @author        Dave Nicholson
* @link        http://www.davenicholson.co.uk/
*/

/**
* Jload
*
* @package CodeIgniter
* @author
* @copyright 2008
* @version $Id$
* @access public
*/
class Jload
{

    var $javascript_path;
    var $javascript_files;
    var $CI;
    var $dynamic;


    /**
     * Jload::Jload()
     *
     * @return
     */
    function Jload()
    {

        // Get CodeIgniter instance
        $this->CI = &get_instance();
        // Load JLoad config file
        $this->CI->load->config('jload');
        // Get Javascript path
        $this->javascript_path = $this->CI->config->item('javascript_path');
        // Load dynamically?
        $this->dynamic = $this->CI->config->item('javascript_dynamic');
        // Clear files array
        $this->clear();

        // Get autoload javascipt files
        $autoload_javascript = $this->CI->config->item('javascript_autoload');
        if ($autoload_javascript) {
            $this->add($autoload_javascript);
        }

    }

    /**
     * Jload::add()
     *
     * Add a single or array of javascript filenames
     * @param mixed $files
     * @return
     */
    function add($files)
    {
        // If $files is an array
        if (is_array($files)) {
            // Add each one to javascript_files
            foreach ($files as $file) {

                if (!in_array($file, $this->javascript_files)) {
                    $this->javascript_files[] = trim($file);
                }
            }
        } else {
            // Loop through passed params
            for ($i = 0; $i < func_num_args(); $i++) {

                if (!in_array(func_get_arg($i), $this->javascript_files)) {
                    $this->javascript_files[] = trim(func_get_arg($i));
                }
            }
        }
    }

  /**
   * Jload::group()
   *
   * Add a grouped list of file names from the jload config file
   * @param mixed $group
   * @return void
   */
    function group($group) {

        $this->add($this->CI->config->item('jload_'.$group));

    }

    /**
     * Jload::generate()
     *
     * Return HTML script tags with javascript file src elements
     *     - $no_tags = TRUE just returns array of added filenames
     * @param bool $no_tags
     * @return
     */
    function generate($no_tags = false)
    {
        // Clear output
        $output = "";

        if($this->dynamic) {

            $output = "<script type=\"text/javascript\">";
            $output .= "\nfunction loadJS(url) {";
            $output .= "\n  var e = document.createElement(\"script\"); e.src = url; e.type=\"text/javascript\";";
            $output .= "\n  document.getElementsByTagName(\"head\")[0].appendChild(e);";
            $output .= "\n}";
            $output .= "\nonload = function() {";

            if (!$no_tags) {
                // Loop through files and output script tags
                foreach ($this->javascript_files as $file) {

                    $output .= "\n  loadJS(\"{$this->javascript_path}{$file}\");";

                }

                $output .= "\n}";
                $output .= "\n</script>";

            } else {

                return $this->javascript_files;

            }

        } else {

            if (!$no_tags) {
                // Loop through files and output script tags
                foreach ($this->javascript_files as $file) {

                    $output .= "<script type=\"text/javascript\" src=\"{$this->javascript_path}{$file}\"></script>\n";

                }

            } else {

                return $this->javascript_files;

            }

        }



        return $output;

    }

    /**
     * Jload::clear()
     *
     * Clears javascript_files array
     * @return
     */
    function clear()
    {

        $this->javascript_files = array();

    }

}
?>