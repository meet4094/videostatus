<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Festivalimage extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function view()
    {
        $festivalcategories = $this->model_api->get("sh_festivalcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        $res['festivalcategories'] = $festivalcategories['data'];
        $res['languages'] = $languages['data'];
        $this->load->view("admin/festivalimage_view", $res);
    }

    function add()
    {
        $festivalcategories = $this->model_api->get("sh_festivalcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        if (isset($this->param['submit'])) {
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['description'] = $this->param['description'];
            $inserted_fields['category_id'] = $this->param['category_id'];
            $inserted_fields['language_id'] = $this->param['language_id'];
            $inserted_fields['is_del'] = $this->param['is_del'];
            $status = $this->model_api->add("sh_festivalimage", $inserted_fields);
            if (!isset($status['data']['id']) || $status['statuscode'] != 1) {
                $res = error_res();
            } else {
                $id = $status['data']['id'];
                if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                    $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                    $imageName = md5($id) . '.' . $iExt;
                    check_and_create_directory(FESTIVALIMAGE_IMAGE_PATH);
                    move_uploaded_file($_FILES['image']['tmp_name'], FESTIVALIMAGE_IMAGE_PATH . DS . $imageName);
                    $updated_fields['image'] = $imageName;
                    $this->model_api->update("sh_festivalimage", $updated_fields, array("and" => array("id" => $id)));
                }
                $res = success_res();
            }
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_add", $res);
        } else {
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_add", $res);
        }
    }

    public function add_dropzonimage()
    {
        //print_r($_FILES); die;
        $festivalcategories = $this->model_api->get("sh_festivalcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        if (isset($_POST['submit'])) {
            foreach ($_FILES['image']['name'] as $key => $val) {
                $iExt = strtolower(substr($_FILES['image']['name'][$key], strrpos($_FILES['image']['name'][$key], ".") + 1));
                $imageName = md5(uniqid() . time()) . '.' . $iExt;
                move_uploaded_file($_FILES['image']['tmp_name'][$key], FESTIVALIMAGE_IMAGE_PATH . DS . $imageName);

                // $inserted_fields['name'] = $_FILES['image']['name'][$key];
                $inserted_fields['category_id'] = $this->param['category_id'];
                $inserted_fields['language_id'] = $this->param['language_id'];
                $inserted_fields['image'] = $imageName;
                $status = $this->model_api->add("sh_festivalimage", $inserted_fields);
                if (!isset($status['data']['id']) || $status['statuscode'] != 1) {
                    $res = error_res();
                } else {
                    $id = $status['data']['id'];
                    $res = success_res();
                }
            }
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_adddropzone", $res);
        } else {
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_adddropzone", $res);
        }
    }

    public function add_fileupload()
    {
        $festivalcategories = $this->model_api->get("sh_festivalcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        if (isset($_POST['submit'])) {
            foreach ($_FILES['image']['name'] as $key => $val) {
                $iExt = strtolower(substr($_FILES['image']['name'][$key], strrpos($_FILES['image']['name'][$key], ".") + 1));
                $imageName = md5(uniqid() . time()) . '.' . $iExt;
                move_uploaded_file($_FILES['image']['tmp_name'][$key], FESTIVALIMAGE_IMAGE_PATH . DS . $imageName);

                // $inserted_fields['name'] = $_FILES['image']['name'][$key];
                $inserted_fields['category_id'] = $this->param['category_id'];
                $inserted_fields['language_id'] = $this->param['language_id'];
                $inserted_fields['image'] = $imageName;
                $status = $this->model_api->add("sh_festivalimage", $inserted_fields);
                if (!isset($status['data']['id']) || $status['statuscode'] != 1) {
                    $res = error_res();
                } else {
                    $id = $status['data']['id'];
                    $res = success_res();
                }
            }
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_addmultiple copy", $res);
        } else {
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_addmultiple copy", $res);
        }
    }
    public function add_multiimage()
    {
        $festivalcategories = $this->model_api->get("sh_festivalcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        if (isset($_POST['submit'])) {
            foreach ($_FILES['image']['name'] as $key => $val) {
                $iExt = strtolower(substr($_FILES['image']['name'][$key], strrpos($_FILES['image']['name'][$key], ".") + 1));
                $imageName = md5(uniqid() . time()) . '.' . $iExt;
                move_uploaded_file($_FILES['image']['tmp_name'][$key], FESTIVALIMAGE_IMAGE_PATH . DS . $imageName);

                // $inserted_fields['name'] = $_FILES['image']['name'][$key];
                $inserted_fields['category_id'] = $this->param['category_id'];
                $inserted_fields['language_id'] = $this->param['language_id'];
                $inserted_fields['image'] = $imageName;
                $status = $this->model_api->add("sh_festivalimage", $inserted_fields);
                if (!isset($status['data']['id']) || $status['statuscode'] != 1) {
                    $res = error_res();
                } else {
                    $id = $status['data']['id'];
                    $res = success_res();
                }
            }
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_addmultiple", $res);
        } else {
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_addmultiple", $res);
        }
    }


    function edit($id)
    {
        $festivalcategories = $this->model_api->get("sh_festivalcategory", array("id,name"), array("and" => array("is_del" => 0)));
        $languages = $this->model_api->get("sh_language", array("id,name"), array("and" => array("is_del" => 0)));
        if (isset($this->param['submit'])) {
            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
                $iOriginal = $this->model_api->get("sh_festivalimage", array("image"), array("and" => array("id" => $id)));
                if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                    $iOriginal = FESTIVALIMAGE_IMAGE_PATH . DS . $iOriginal['data'][0]['image'];
                    if (file_exists($iOriginal))
                        @unlink($iOriginal);
                }
                $iExt = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], ".") + 1));
                $imageName = md5($id) . '.' . $iExt;
                check_and_create_directory(FESTIVALIMAGE_IMAGE_PATH);
                move_uploaded_file($_FILES['image']['tmp_name'], FESTIVALIMAGE_IMAGE_PATH . DS . $imageName);
                $inserted_fields['image'] = $imageName;
            }
            $inserted_fields['name'] = $this->param['name'];
            $inserted_fields['description'] = $this->param['description'];
            $inserted_fields['category_id'] = $this->param['category_id'];
            $inserted_fields['language_id'] = $this->param['language_id'];
            $inserted_fields['is_del'] = $this->param['is_del'];
            $inserted_fields['modified_date'] = date("Y-m-d H:i:s");
            $status = $this->model_api->update("sh_festivalimage", $inserted_fields, array("and" => array("id" => $id)));
            if (!isset($status['statuscode']) || $status['statuscode'] != 1) {
                $res = error_res();
            } else {
                $res = success_res();
            }
            $edit_festivalimage = $this->model_api->get("sh_festivalimage", array("id,name,description,category_id,language_id,image,is_del"), array("and" => array("id" => $id)));
            $res['edit_festivalimage'] = $edit_festivalimage['data'][0];
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_edit", $res);
        } else {
            $edit_festivalimage = $this->model_api->get("sh_festivalimage", array("id,name,description,category_id,language_id,image,is_del"), array("and" => array("id" => $id)));
            $res['edit_festivalimage'] = $edit_festivalimage['data'][0];
            $res['festivalcategories'] = $festivalcategories['data'];
            $res['languages'] = $languages['data'];
            $this->load->view("admin/festivalimage_edit", $res);
        }
    }

    function delete($id)
    {
        if ($id && is_numeric($id)) {
            $iOriginal = $this->model_api->get("sh_festivalimage", array("image"), array("and" => array("id" => $id)));
            if (isset($iOriginal['data'][0]['image']) && !empty($iOriginal['data'][0]['image'])) {
                $iOriginal = FESTIVALIMAGE_IMAGE_PATH . DS . $iOriginal['data'][0]['image'];
                if (file_exists($iOriginal))
                    @unlink($iOriginal);
            }
            $iQry = "DELETE FROM sh_festivalimage WHERE id = {$id}";
            $this->model_api->execute_query($iQry);
        }
        redirect(BASE_URL . "admin/festivalimage/view");
    }

    function load_festivalimage()
    {
        $iWhere = " WHERE sh_festivalimage.id IS NOT NULL";
        if (isset($this->param['action']) && $this->param['action'] == 'filter') {
            if (isset($this->param['name']) && $this->param['name'] != '')
                $iWhere .= " AND sh_festivalimage.name LIKE '%" . $this->param['name'] . "%'";
            if (isset($this->param['category_id']) && $this->param['category_id'] != '')
                $iWhere .= " AND sh_festivalimage.category_id = " . $this->param['category_id'];
            if (isset($this->param['language_id']) && $this->param['language_id'] != '')
                $iWhere .= " AND sh_festivalimage.language_id = " . $this->param['language_id'];
            if (isset($this->param['is_del']) && $this->param['is_del'] != '')
                $iWhere .= " AND sh_festivalimage.is_del = " . $this->param['is_del'];
        }

        $iResCount = $this->model_api->execute_query("SELECT COUNT(sh_festivalimage.id) cnt FROM sh_festivalimage JOIN sh_festivalcategory ON (sh_festivalcategory.id = sh_festivalimage.category_id) " . $iWhere);
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

        $iLimit = "LIMIT " . $iDisplayStart . ", " . $iDisplayLength;
        $iQry = "SELECT sh_festivalimage.id,sh_festivalimage.name,sh_festivalimage.image,sh_festivalimage.description,sh_festivalimage.category_id,sh_festivalimage.language_id,sh_festivalimage.created_date,sh_festivalimage.is_del,sh_festivalcategory.name as festivalcategoryname,sh_language.name as languagename FROM sh_festivalimage JOIN sh_festivalcategory ON (sh_festivalcategory.id = sh_festivalimage.category_id) JOIN sh_language ON (sh_language.id = sh_festivalimage.language_id) {$iWhere} ORDER BY sh_festivalimage.id DESC {$iLimit}";
        $iDataLists = $this->model_api->execute_query($iQry);

        foreach ($iDataLists['data'] as $key => $iData) {
            if (isset($iData['image']) && $iData['image'] != "")
                $iData['image'] = '<a target="_blank" href="' . FESTIVALIMAGE_IMAGE_URL . DS . $iData['image'] . '"><img width="150" src="' . FESTIVALIMAGE_IMAGE_URL . DS . $iData['image'] . '"/></a>';
            $iStatus = $statusList[$iData['is_del']];
            $records["data"][] = array(
                $iData['id'],
                $iData['name'],
                $iData['description'],
                $iData['festivalcategoryname'],
                $iData['image'],
                $iData['languagename'],
                date("d M, Y g:i A", strtotime($iData['created_date'])),
                '<span class="label label-sm label-' . (key($iStatus)) . '">' . (current($iStatus)) . '</span>',
                '<a href="' . BASE_URL . "admin/festivalimage/edit/" . $iData['id'] . '" class="btn btn-sm btn-outline blue"><i class="fa fa-edit"></i> Edit</a> <a href="' . BASE_URL . "admin/festivalimage/delete/" . $iData['id'] . '" class="btn btn-sm btn-outline red"><i class="fa fa-trash"></i> Delete</a>',
            );
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        echo json_encode($records);
    }
}
