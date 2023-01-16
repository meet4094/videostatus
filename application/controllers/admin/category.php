<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class category extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function view()
    {
        $this->load->view('admin/category_view');
    }

    public function add()
    {
        if (isset($this->param['submit'])) {
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['festival_date'] = $this->param['festival_date'];
            $inserted_fields['active_from'] = $this->param['active_from'];
            $inserted_fields['detail_message'] = $this->param['detail_message'];
            $status = $this->model_api->add("category", $inserted_fields);
            if (!isset($status['data']['id']) || $status['statuscode'] != 1) {
                $res = error_res();
            } else {
                $id = $status['data']['id'];
                if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                    $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                    $imageName = md5($id) . '.' . $iExt;
                    check_and_create_directory(FESTIVALCATEGORY_IMAGE_PATH);
                    move_uploaded_file($_FILES['image']['tmp_name'], FESTIVALCATEGORY_IMAGE_PATH . DS . $imageName);
                    $updated_fields['image'] = $imageName;
                    $this->model_api->update("category", $updated_fields, array("and" => array("id" => $id)));
                }
                $res = success_res();
            }
            $this->load->view("admin/category_add", $res);
        } else {
            $this->load->view("admin/category_add");
        }
    }

    function edit($id)
    {
        if (isset($this->param['submit'])) {
            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                $iOriginal = $this->model_api->get("category", array("image"), array("and" => array("id" => $id)));
                if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                    $iOriginal = FESTIVALCATEGORY_IMAGE_PATH . DS . $iOriginal['data'][0]['image'];
                    if (file_exists($iOriginal))
                        @unlink($iOriginal);
                }
                $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                $imageName = md5($id) . '.' . $iExt;
                check_and_create_directory(FESTIVALCATEGORY_IMAGE_PATH);
                move_uploaded_file($_FILES['image']['tmp_name'], FESTIVALCATEGORY_IMAGE_PATH . DS . $imageName);
                $inserted_fields['image'] = $imageName;
            }
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['festival_date'] = $this->param['festival_date'];
            $inserted_fields['active_from'] = $this->param['active_from'];
            $inserted_fields['detail_message'] = $this->param['detail_message'];
            $status = $this->model_api->update("category", $inserted_fields, array("and" => array("id" => $id)));
            if (!isset($status['statuscode']) || $status['statuscode'] != 1) {
                $res = error_res();
            } else {
                $res = success_res();
            }
            $edit_festivalcategory = $this->model_api->get("category", array("id,name,festival_date,active_from,detail_message,image"), array("and" => array("id" => $id)));
            $res['edit_festivalcategory'] = $edit_festivalcategory['data'][0];
            $this->load->view("admin/category_edit", $res);
        } else {
            $edit_festivalcategory = $this->model_api->get("category", array("id,name,festival_date,active_from,detail_message,image"), array("and" => array("id" => $id)));
            $res['edit_festivalcategory'] = $edit_festivalcategory['data'][0];
            $this->load->view("admin/category_edit", $res);
        }
    }

    function delete($id)
    {
        if ($id && is_numeric($id)) {
            $iOriginal = $this->model_api->get("category", array("image"), array("and" => array("id" => $id)));
            if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                $iOriginal = FESTIVALCATEGORY_IMAGE_PATH . DS . $iOriginal['data'][0]['image'];
                if (file_exists($iOriginal))
                    @unlink($iOriginal);
            }
            $iQry = "DELETE FROM category WHERE id = {$id}";
            $this->model_api->execute_query($iQry);
        }
        redirect(BASE_URL . "admin/category/view");
    }

    function load_festivalcategory()
    {
        $iWhere = " WHERE id IS NOT NULL";
        if (isset($this->param['action']) && $this->param['action'] == 'filter') {
            if (isset($this->param['name']) && $this->param['name'] != '')
                $iWhere .= " AND name LIKE '%" . $this->param['name'] . "%'";
            if (isset($this->param['detail_display']) && $this->param['detail_display'] != '')
                $iWhere .= " AND detail_display = " . $this->param['detail_display'];
            if (isset($this->param['is_del']) && $this->param['is_del'] != '')
                $iWhere .= " AND is_del = " . $this->param['is_del'];
        }

        $iResCount = $this->model_api->execute_query("SELECT COUNT(id) cnt FROM category " . $iWhere);
        $iTotalRecords = isset($iResCount['data'][0]['cnt']) ? $iResCount['data'][0]['cnt'] : 0;
        $iDisplayLength = intval($this->param['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($this->param['start']);
        $sEcho = intval($this->param['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        // $statusList = array(
        //     array("success" => "Enable"),
        //     array("danger" => "Disable")
        // );

        // $displayList = array(
        //     array("danger" => "No"),
        //     array("success" => "Yes")
        // );

        $iLimit = "LIMIT " . $iDisplayStart . ", " . $iDisplayLength;
        $iQry = "SELECT id,name,image,festival_date,active_from,detail_message FROM category {$iWhere} ORDER BY id DESC {$iLimit}";
        $iDataLists = $this->model_api->execute_query($iQry);

        foreach ($iDataLists['data'] as $key => $iData) {
            if (isset($iData['image']) && $iData['image'] != "")
                $iData['image'] = '<a target="_blank" href="' . FESTIVALCATEGORY_IMAGE_URL . DS . $iData['image'] . '"><img width="150" src="' . FESTIVALCATEGORY_IMAGE_URL . DS . $iData['image'] . '"/></a>';
            // $iStatus = $statusList[$iData['is_del']];
            // $iDisplay = $displayList[$iData['detail_display']];
            $records["data"][] = array(
                $iData['id'],
                $iData['name'],
                $iData['image'],
                date("d M, Y", strtotime($iData['festival_date'])),
                date("d M, Y", strtotime($iData['active_from'])),
                // '<span class="label label-sm label-' . (key($iDisplay)) . '">' . (current($iDisplay)) . '</span>',
                $iData['detail_message'],
                // date("d M, Y g:i A", strtotime($iData['created_date'])),
                // '<span class="label label-sm label-' . (key($iStatus)) . '">' . (current($iStatus)) . '</span>',
                '<a href="' . BASE_URL . "admin/category/edit/" . $iData['id'] . '" class="btn btn-sm btn-outline blue"><i class="fa fa-edit"></i> Edit</a> <a href="' . BASE_URL . "admin/category/delete/" . $iData['id'] . '" class="btn btn-sm btn-outline red"><i class="fa fa-trash"></i> Delete</a>',
            );
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        echo json_encode($records);
    }
}
