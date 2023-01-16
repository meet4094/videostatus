<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        echo "<center>Welcome to Admin Panel.</center>";
    }
    
    function dashboard() {
        $iQry = "SELECT COUNT(uid) cnt FROM sh_users";
        $iUserCount = $this->model_api->execute_query($iQry);
        $iDashboard['iUserCount'] = isset($iUserCount['data'][0]['cnt']) ? $iUserCount['data'][0]['cnt'] : 0;

        $iQry = "SELECT COUNT(id) AS cnt FROM sh_festivalimage";
        $iPostCount = $this->model_api->execute_query($iQry);
        $iDashboard['iFestivalImageCount'] = isset($iPostCount['data'][0]['cnt']) ? $iPostCount['data'][0]['cnt'] : 0;

        $iQry = "SELECT COUNT(id) AS cnt FROM sh_festivalvideo";
        $iPostCount = $this->model_api->execute_query($iQry);
        $iDashboard['iFestivalVideoCount'] = isset($iPostCount['data'][0]['cnt']) ? $iPostCount['data'][0]['cnt'] : 0;

        $iQry = "SELECT COUNT(id) AS cnt FROM sh_businessimage";
        $iPostCount = $this->model_api->execute_query($iQry);
        $iDashboard['iBusinessImageCount'] = isset($iPostCount['data'][0]['cnt']) ? $iPostCount['data'][0]['cnt'] : 0;

        $iQry = "SELECT COUNT(id) AS cnt FROM sh_businessvideo";
        $iPostCount = $this->model_api->execute_query($iQry);
        $iDashboard['iBusinessVideoCount'] = isset($iPostCount['data'][0]['cnt']) ? $iPostCount['data'][0]['cnt'] : 0;

        $iQry = "SELECT COUNT(id) AS cnt FROM sh_greetingimage";
        $iPostCount = $this->model_api->execute_query($iQry);
        $iDashboard['iGreetingImageCount'] = isset($iPostCount['data'][0]['cnt']) ? $iPostCount['data'][0]['cnt'] : 0;

        $iQry = "SELECT COUNT(id) AS cnt FROM sh_greetingvideo";
        $iPostCount = $this->model_api->execute_query($iQry);
        $iDashboard['iGreetingVideoCount'] = isset($iPostCount['data'][0]['cnt']) ? $iPostCount['data'][0]['cnt'] : 0;

        $iQry = "SELECT Year(created_date) AS year, Month(created_date) AS month, DAY(created_date) AS day, count(created_date) AS user FROM sh_users GROUP BY DATE(created_date) ORDER BY DATE(created_date) DESC LIMIT 30";
        $iUserRegState = $this->model_api->execute_query($iQry);
        $iDashboard['iUserRegState'] = isset($iUserRegState['data']) ? array_reverse($iUserRegState['data']) : new stdclass();

        $this->load->view('admin/dashboard',$iDashboard);
    }
    
}