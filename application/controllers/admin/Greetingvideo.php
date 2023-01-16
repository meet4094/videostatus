<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Greetingvideo extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function view() {
        $greetingcategories = $this->model_api->get("sh_greetingcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        $res['greetingcategories'] = $greetingcategories['data'];
        $res['languages'] = $languages['data'];
        $this->load->view("admin/greetingvideo_view", $res);
    }

    function add() {
        $greetingcategories = $this->model_api->get("sh_greetingcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        if (isset($this->param['submit'])) {
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['description'] = $this->param['description'];
            $inserted_fields['category_id'] = $this->param['category_id'];
            $inserted_fields['language_id'] = $this->param['language_id'];
            $inserted_fields['is_del'] = $this->param['is_del'];
            $status = $this->model_api->add("sh_greetingvideo", $inserted_fields);
            if (!isset($status['data']['id']) || $status['statuscode'] != 1){
                $res = error_res();
            } else {
                $id = $status['data']['id'];
                if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                    $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                    $imageName = md5($id).'.'.$iExt;
                    check_and_create_directory(GREETINGVIDEO_IMAGE_PATH);
                    move_uploaded_file($_FILES['image']['tmp_name'], GREETINGVIDEO_IMAGE_PATH.DS.$imageName);
                    $updated_fields['image'] = $imageName;
                    $this->model_api->update("sh_greetingvideo", $updated_fields, array("and" => array("id" => $id)));
                }
                $res = success_res();
            }
            $res['greetingcategories'] = $greetingcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/greetingvideo_add", $res);
        } else {
            $res['greetingcategories'] = $greetingcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/greetingvideo_add", $res);
        }
    }

    function edit($id) {
        $greetingcategories = $this->model_api->get("sh_greetingcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        if (isset($this->param['submit'])) {
            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                $iOriginal = $this->model_api->get("sh_greetingvideo", array("image"), array("and" => array("id" => $id)));
                if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                    $iOriginal = GREETINGVIDEO_IMAGE_PATH.DS.$iOriginal['data'][0]['image'];
                    if (file_exists($iOriginal))
                        @unlink($iOriginal);
                }
                $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                $imageName = md5($id).'.'.$iExt;
                check_and_create_directory(GREETINGVIDEO_IMAGE_PATH);
                move_uploaded_file($_FILES['image']['tmp_name'], GREETINGVIDEO_IMAGE_PATH.DS.$imageName);
                $inserted_fields['image'] = $imageName;
            }
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['description'] = $this->param['description'];
            $inserted_fields['category_id'] = $this->param['category_id'];
            $inserted_fields['language_id'] = $this->param['language_id'];
            $inserted_fields['is_del'] = $this->param['is_del'];
            $inserted_fields['modified_date'] = date("Y-m-d H:i:s");
            $status = $this->model_api->update("sh_greetingvideo", $inserted_fields, array("and" => array("id" => $id)));
            if (!isset($status['statuscode']) || $status['statuscode'] != 1){
                $res = error_res();
            } else {
                $res = success_res();
            }
            $edit_greetingvideo = $this->model_api->get("sh_greetingvideo", array("id,name,description,category_id,language_id,image,is_del"), array("and" => array("id" => $id)));
            $res['edit_greetingvideo'] = $edit_greetingvideo['data'][0];
            $res['greetingcategories'] = $greetingcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/greetingvideo_edit", $res);
        } else {
            $edit_greetingvideo = $this->model_api->get("sh_greetingvideo", array("id,name,description,category_id,language_id,image,is_del"), array("and" => array("id" => $id)));
            $res['edit_greetingvideo'] = $edit_greetingvideo['data'][0];
            $res['greetingcategories'] = $greetingcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/greetingvideo_edit", $res);
        }
    }

    function delete($id) {
        if ($id && is_numeric($id)) {
            $iOriginal = $this->model_api->get("sh_greetingvideo", array("image"), array("and" => array("id" => $id)));
            if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                $iOriginal = GREETINGVIDEO_IMAGE_PATH.DS.$iOriginal['data'][0]['image'];
                if (file_exists($iOriginal))
                    @unlink($iOriginal);
            }
            $iQry = "DELETE FROM sh_greetingvideo WHERE id = {$id}";
            $this->model_api->execute_query($iQry);
        }
        redirect(BASE_URL."admin/greetingvideo/view");
    }

    function load_greetingvideo() {        
        $iWhere = " WHERE sh_greetingvideo.id IS NOT NULL";
        if (isset($this->param['action']) && $this->param['action'] == 'filter') {
            if(isset($this->param['name']) && $this->param['name'] != '')
                $iWhere .= " AND sh_greetingvideo.name LIKE '%".$this->param['name']."%'";
            if(isset($this->param['category_id']) && $this->param['category_id'] != '')
                $iWhere .= " AND sh_greetingvideo.category_id = ".$this->param['category_id'];
            if(isset($this->param['language_id']) && $this->param['language_id'] != '')
                $iWhere .= " AND sh_greetingvideo.language_id = ".$this->param['language_id'];
            if(isset($this->param['is_del']) && $this->param['is_del'] != '')
                $iWhere .= " AND sh_greetingvideo.is_del = ".$this->param['is_del'];
        }

        $iResCount = $this->model_api->execute_query("SELECT COUNT(sh_greetingvideo.id) cnt FROM sh_greetingvideo JOIN sh_greetingcategory ON (sh_greetingcategory.id = sh_greetingvideo.category_id) ".$iWhere);
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

        $iLimit = "LIMIT ".$iDisplayStart.", ".$iDisplayLength;
        $iQry = "SELECT sh_greetingvideo.id,sh_greetingvideo.name,sh_greetingvideo.image,sh_greetingvideo.description,sh_greetingvideo.category_id,sh_greetingvideo.language_id,sh_greetingvideo.created_date,sh_greetingvideo.is_del,sh_greetingcategory.name as greetingcategoryname,sh_language.name as languagename FROM sh_greetingvideo JOIN sh_greetingcategory ON (sh_greetingcategory.id = sh_greetingvideo.category_id) JOIN sh_language ON (sh_language.id = sh_greetingvideo.language_id) {$iWhere} ORDER BY sh_greetingvideo.id DESC {$iLimit}";
        $iDataLists = $this->model_api->execute_query($iQry);

        foreach ($iDataLists['data'] as $key => $iData) {
            if (isset($iData['image']) && $iData['image'] != "")
                $iData['image'] = '<a target="_blank" href="'.GREETINGVIDEO_IMAGE_URL.DS.$iData['image'].'"><video controls width="150" src="'.GREETINGVIDEO_IMAGE_URL.DS.$iData['image'].'"/></a>';
            $iStatus = $statusList[$iData['is_del']];
            $records["data"][] = array(
                $iData['id'],
                $iData['name'],
                $iData['description'],
                $iData['greetingcategoryname'],
                $iData['image'],
                $iData['languagename'],
                date("d M, Y g:i A", strtotime($iData['created_date'])),
                '<span class="label label-sm label-'.(key($iStatus)).'">'.(current($iStatus)).'</span>',
                '<a href="'.BASE_URL."admin/greetingvideo/edit/".$iData['id'].'" class="btn btn-sm btn-outline blue"><i class="fa fa-edit"></i> Edit</a> <a href="'.BASE_URL."admin/greetingvideo/delete/".$iData['id'].'" class="btn btn-sm btn-outline red"><i class="fa fa-trash"></i> Delete</a>',
            );
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        echo json_encode($records);
    }
}