<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Greetingcategory extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function view() {
        $this->load->view("admin/greetingcategory_view");
    }

    function add() {
        if (isset($this->param['submit'])) {
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['detail_display'] = $this->param['detail_display'];
            $inserted_fields['detail_message'] = $this->param['detail_message'];
            $inserted_fields['is_del'] = $this->param['is_del'];
            $status = $this->model_api->add("sh_greetingcategory", $inserted_fields);
            if (!isset($status['data']['id']) || $status['statuscode'] != 1){
                $res = error_res();
            } else {
                $id = $status['data']['id'];
                if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                    $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                    $imageName = md5($id).'.'.$iExt;
                    check_and_create_directory(GREETINGCATEGORY_IMAGE_PATH);
                    move_uploaded_file($_FILES['image']['tmp_name'], GREETINGCATEGORY_IMAGE_PATH.DS.$imageName);
                    $updated_fields['image'] = $imageName;
                    $this->model_api->update("sh_greetingcategory", $updated_fields, array("and" => array("id" => $id)));
                }
                $res = success_res();
            }
            $this->load->view("admin/greetingcategory_add", $res);
        } else {
            $this->load->view("admin/greetingcategory_add");
        }
    }

    function edit($id) {
        if (isset($this->param['submit'])) {
            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                $iOriginal = $this->model_api->get("sh_greetingcategory", array("image"), array("and" => array("id" => $id)));
                if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                    $iOriginal = GREETINGCATEGORY_IMAGE_PATH.DS.$iOriginal['data'][0]['image'];
                    if (file_exists($iOriginal))
                        @unlink($iOriginal);
                }
                $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                $imageName = md5($id).'.'.$iExt;
                check_and_create_directory(GREETINGCATEGORY_IMAGE_PATH);
                move_uploaded_file($_FILES['image']['tmp_name'], GREETINGCATEGORY_IMAGE_PATH.DS.$imageName);
                $inserted_fields['image'] = $imageName;
            }
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['detail_display'] = $this->param['detail_display'];
            $inserted_fields['detail_message'] = $this->param['detail_message'];
            $inserted_fields['is_del'] = $this->param['is_del'];
            $inserted_fields['modified_date'] = date("Y-m-d H:i:s");
            $status = $this->model_api->update("sh_greetingcategory", $inserted_fields, array("and" => array("id" => $id)));
            if (!isset($status['statuscode']) || $status['statuscode'] != 1){
                $res = error_res();
            } else {
                $res = success_res();
            }
            $edit_greetingcategory = $this->model_api->get("sh_greetingcategory", array("id,name,detail_display,detail_message,image,is_del"), array("and" => array("id" => $id)));
            $res['edit_greetingcategory'] = $edit_greetingcategory['data'][0];
            $this->load->view("admin/greetingcategory_edit", $res);
        } else {
            $edit_greetingcategory = $this->model_api->get("sh_greetingcategory", array("id,name,detail_display,detail_message,image,is_del"), array("and" => array("id" => $id)));
            $res['edit_greetingcategory'] = $edit_greetingcategory['data'][0];
            $this->load->view("admin/greetingcategory_edit", $res);
        }
    }

    function delete($id) {
        if ($id && is_numeric($id)) {
            $iOriginal = $this->model_api->get("sh_greetingcategory", array("image"), array("and" => array("id" => $id)));
            if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                $iOriginal = GREETINGCATEGORY_IMAGE_PATH.DS.$iOriginal['data'][0]['image'];
                if (file_exists($iOriginal))
                    @unlink($iOriginal);
            }
            $iQry = "DELETE FROM sh_greetingcategory WHERE id = {$id}";
            $this->model_api->execute_query($iQry);
        }
        redirect(BASE_URL."admin/greetingcategory/view");
    }

    function load_greetingcategory() {        
        $iWhere = " WHERE id IS NOT NULL";
        if (isset($this->param['action']) && $this->param['action'] == 'filter') {
            if(isset($this->param['name']) && $this->param['name'] != '')
                $iWhere .= " AND name LIKE '%".$this->param['name']."%'";
            if(isset($this->param['detail_display']) && $this->param['detail_display'] != '')
                $iWhere .= " AND detail_display = ".$this->param['detail_display'];
            if(isset($this->param['is_del']) && $this->param['is_del'] != '')
                $iWhere .= " AND is_del = ".$this->param['is_del'];
        }

        $iResCount = $this->model_api->execute_query("SELECT COUNT(id) cnt FROM sh_greetingcategory ".$iWhere);
        $iTotalRecords = isset($iResCount['data'][0]['cnt']) ? $iResCount['data'][0]['cnt'] : 0;
        $iDisplayLength = intval($this->param['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
        $iDisplayStart = intval($this->param['start']);
        $sEcho = intval($this->param['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        $statusList = array(
            array("success" => "Enable"),
            array("danger" => "Disable")
        );

        $displayList = array(
            array("danger" => "No"),
            array("success" => "Yes")
        );

        $iLimit = "LIMIT ".$iDisplayStart.", ".$iDisplayLength;
        $iQry = "SELECT id,name,image,detail_display,detail_message,created_date,is_del FROM sh_greetingcategory {$iWhere} ORDER BY id DESC {$iLimit}";
        $iDataLists = $this->model_api->execute_query($iQry);

        foreach ($iDataLists['data'] as $key => $iData) {
            if (isset($iData['image']) && $iData['image'] != "")
                $iData['image'] = '<a target="_blank" href="'.GREETINGCATEGORY_IMAGE_URL.DS.$iData['image'].'"><img width="150" src="'.GREETINGCATEGORY_IMAGE_URL.DS.$iData['image'].'"/></a>';
            $iStatus = $statusList[$iData['is_del']];
            $iDisplay = $displayList[$iData['detail_display']];
            $records["data"][] = array(
                $iData['id'],
                $iData['name'],
                $iData['image'],
                '<span class="label label-sm label-'.(key($iDisplay)).'">'.(current($iDisplay)).'</span>',
                $iData['detail_message'],
                date("d M, Y g:i A", strtotime($iData['created_date'])),
                '<span class="label label-sm label-'.(key($iStatus)).'">'.(current($iStatus)).'</span>',
                '<a href="'.BASE_URL."admin/greetingcategory/edit/".$iData['id'].'" class="btn btn-sm btn-outline blue"><i class="fa fa-edit"></i> Edit</a> <a href="'.BASE_URL."admin/greetingcategory/delete/".$iData['id'].'" class="btn btn-sm btn-outline red"><i class="fa fa-trash"></i> Delete</a>',
            );
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        echo json_encode($records);
    }
}