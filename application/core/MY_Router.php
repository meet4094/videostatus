<?php

/*
 * Edited by : Paresh Thummar
 * Add functionality : read into more than one sub-folder
 *
 */

Class MY_Router extends CI_Router {

    public function __construct()
    {
        parent::__construct();
    }

    function _validate_request($segments)
    {
        if (file_exists(APPPATH . 'controllers/' . $segments[0] . '.php'))
        {
            return $segments;
        }

        if (is_dir(APPPATH . 'controllers/' . $segments[0]))
        {
            $this->set_directory($segments[0]);
            $segments = array_slice($segments, 1);
            /* ----------- ADDED CODE ------------ */
            
            while (count($segments) > 0 && is_dir(APPPATH . 'controllers/' . $this->directory . $segments[0]))
            {
                // Set the directory and remove it from the segment array
                $this->set_directory($this->directory. $segments[0]);
                $segments = array_slice($segments, 1);
            }

            /* ----------- END ------------ */

            if (count($segments) > 0)
            {
                if (!file_exists(APPPATH . 'controllers/' . $this->directory . ucfirst($segments[0]) . '.php'))
                {
                    show_404($this->fetch_directory() . $segments[0]);
                }
            }
            else
            {
                $this->set_class($this->default_controller);
                $this->set_method('index');

                if (!file_exists(APPPATH . 'controllers/' . $this->fetch_directory() . $this->default_controller . '.php'))
                {
                    $this->directory = '';
                    return array();
                }
            }
            
            return $segments;
        }
        show_404($segments[0]);
    }
    
    function set_directory($dir, $append = false)
    {
        $this->directory = rtrim($dir, '/').'/';
    }

}

?>