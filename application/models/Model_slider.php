<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Model_slider extends CI_Model
{

    public function __construct()
    {

        parent::__construct();
    }

    function getSliders($param)
    {

        $iStart = isset($param['start']) ? $param['start'] : 0;

        $iLen = isset($param['len']) ? $param['len'] : 10;

        $searchKey = isset($param['search_key']) ? $param['search_key'] : '';



        $iLimit = '';

        if ($iStart != '-1')

            $iLimit = "LIMIT {$iStart},{$iLen}";

        $iWhere = " WHERE is_del = 0";

        if ($searchKey != '')

            $iWhere .= " AND type_id LIKE '%$searchKey%'";


        $iQuery = "SELECT id,name,image,link,type_id,created_date,modified_date,is_del as status FROM sh_sliders {$iWhere} ORDER BY id DESC {$iLimit}";

        $iCategories = $this->model_api->execute_query($iQuery);

        if (!isset($iCategories['statuscode']) || $iCategories['statuscode'] != 1)

            return error_res("invalid_data");

        if (isset($iCategories['data']) && count($iCategories['data']) > 0) {

            foreach ($iCategories['data'] as $key => $iCategory) {

                if (isset($iCategory['image']) && !empty($iCategory['image']))

                    $iCategories['data'][$key]['image_url'] = SLIDER_IMAGE_PATH . DS . $iCategory['image'];
            }
        }

        $iCategories = $iCategories['data'];

        $iRes = success_res("success");

        $iRes['data'] = $iCategories;
        return $iRes;
    }
}
