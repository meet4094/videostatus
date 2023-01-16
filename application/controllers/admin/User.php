<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function view()
    {
        $this->load->view("admin/user_view");
    }

    function delete($uId)
    {
        if ($uId && is_numeric($uId)) {
            $iQry = "DELETE FROM sh_users WHERE uid = {$uId}";
            $this->model_api->execute_query($iQry);
            $this->model_common->deleteDir(IMAGE_DIR_PATH . DS . "users" . DS . $uId);
        }
        redirect(BASE_URL . "admin/user/view");
    }

    function users_list()
    {
        $iWhere = " WHERE uid != 0";
        if (isset($this->param['action']) && $this->param['action'] == 'filter') {
            if ($this->param['name'] != '')
                $iWhere .= " AND first_name LIKE '%" . $this->param['name'] . "%' OR last_name LIKE '%" . $this->param['name'] . "%'";
            if ($this->param['email'] != '')
                $iWhere .= " AND email LIKE '%" . $this->param['email'] . "%'";
            if ($this->param['is_active'] != '')
                $iWhere .= " AND is_active = " . $this->param['is_active'];
            if ($this->param['is_active_profile'] != '')
                $iWhere .= " AND is_active_profile = " . $this->param['is_active_profile'];
        }

        $iResCount = $this->model_api->execute_query("SELECT COUNT(uid) cnt FROM sh_users" . $iWhere);
        $iTotalRecords = isset($iResCount['data'][0]['cnt']) ? $iResCount['data'][0]['cnt'] : 0;
        $iDisplayLength = intval($this->param['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($this->param['start']);
        $sEcho = intval($this->param['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        $activeList = array(
            array("danger" => "No"),
            array("success" => "Yes")
        );

        $activeProfileList = array(
            array("danger" => "Inactive"),
            array("success" => "Active")
        );

        $iLimit = "LIMIT " . $iDisplayStart . ", " . $iDisplayLength;
        $iQry = "SELECT uid,first_name,last_name,email,mobile_number,is_active,is_active_profile FROM sh_users " . $iWhere . " ORDER BY uid DESC " . $iLimit;
        $iUsers = $this->model_api->execute_query($iQry);

        foreach ($iUsers['data'] as $key => $iUser) {
            $iActiveStatus = $activeList[$iUser['is_active']];
            $iActiveProfileStatus = $activeProfileList[$iUser['is_active_profile']];
            $records["data"][] = array(
                $iUser['uid'],
                $iUser['first_name'] . ' ' . $iUser['last_name'],
                $iUser['email'],
                $iUser['mobile_number'],
                '<span class="label label-sm label-' . (key($iActiveProfileStatus)) . '">' . (current($iActiveProfileStatus)) . '</span>',
                '<span class="label label-sm label-' . (key($iActiveStatus)) . '">' . (current($iActiveStatus)) . '</span>',
                '<a href="' . BASE_URL . "admin/user/delete/" . $iUser['uid'] . '" class="btn btn-sm btn-outline red"><i class="fa fa-trash"></i> Delete</a>',
            );
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        echo json_encode($records);
    }
}
