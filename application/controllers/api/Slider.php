<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!defined('ROUTE_ACCESS'))
            exit('No Access');
        $this->load->model("model_slider");
    }

    function index() {
       _e("<h1><center>Access Denied!!</center></h1>");
    }

    function getSliders() {
        $iRes = $this->validate->getSliders($this->param);
        if ($iRes['statuscode'] != 1)
        response($iRes);
        $iProfile = $this->model_slider->getSliders($iRes['data']);
        response($iProfile);
    }
}