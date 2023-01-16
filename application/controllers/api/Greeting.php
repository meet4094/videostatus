<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Greeting extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!defined('ROUTE_ACCESS'))
            exit('No Access');
        $this->load->model("model_greeting");
    }

    function index() {
       _e("<h1><center>Access Denied!!</center></h1>");
    }

    function getCategories() {
        $iRes = $this->validate->getCategories($this->param);
        if ($iRes['statuscode'] != 1)
            response($iRes);
        $iProfile = $this->model_greeting->getCategories($iRes['data']);
        response($iProfile);
    }

    function getImages() {
        $iRes = $this->validate->getImages($this->param);
        if ($iRes['statuscode'] != 1)
            response($iRes);
        $iProfile = $this->model_greeting->getImages($iRes['data']);
        response($iProfile);
    }

    function getVideos() {
        $iRes = $this->validate->getVideos($this->param);
        if ($iRes['statuscode'] != 1)
            response($iRes);
        $iProfile = $this->model_greeting->getVideos($iRes['data']);
        response($iProfile);
    }
}