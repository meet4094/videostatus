<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Model_greeting extends CI_Model {



    public function __construct() {

        parent::__construct();

    }



    function getCategories($param) {

        $iStart = isset($param['start']) ? $param['start'] : 0;

        $iLen = isset($param['len']) ? $param['len'] : 10;

        $searchKey = isset($param['search_key']) ? $param['search_key'] : '';



        $iLimit = '';

        if ($iStart != '-1')

            $iLimit = "LIMIT {$iStart},{$iLen}";

        $iWhere = " WHERE is_del = 0";

        if ($searchKey != '') 

            $iWhere .= " AND name LIKE '%$searchKey%'";



        $iQuery = "SELECT id,name,image,detail_display,detail_message,created_date,modified_date,is_del as status FROM sh_greetingcategory {$iWhere} ORDER BY id DESC {$iLimit}";

        $iCategories = $this->model_api->execute_query($iQuery);

        if (!isset($iCategories['statuscode']) || $iCategories['statuscode'] != 1)

            return error_res("invalid_data");

        if (isset($iCategories['data']) && count($iCategories['data']) > 0) {

            foreach ($iCategories['data'] as $key => $iCategory) {

                if (isset($iCategory['image']) && !empty($iCategory['image']))

                    $iCategories['data'][$key]['image_url'] = GREETINGCATEGORY_IMAGE_URL.DS.$iCategory['image'];

            }

        }

        $iCategories = $iCategories['data'];

        $iRes = success_res("success");

        $iRes['data'] = $iCategories;

        return $iRes;

    }



    function getImages($param) {

        $iStart = isset($param['start']) ? $param['start'] : 0;

        $iLen = isset($param['len']) ? $param['len'] : 10;

        $searchKey = isset($param['search_key']) ? $param['search_key'] : '';

        $iCategoryId = isset($param['category_id']) ? $param['category_id'] : 0;



        $iLimit = '';

        if ($iStart != '-1')

            $iLimit = "LIMIT {$iStart},{$iLen}";

        $iWhere = " WHERE is_del = 0";

        if ($searchKey != '')

            $iWhere .= " AND name LIKE '%$searchKey%'";

        if ($iCategoryId != 0)

            $iWhere .= " AND category_id = $iCategoryId";



        $iQuery = "SELECT id,name,description,category_id,image,language_id,created_date,modified_date,is_del as status FROM sh_greetingimage {$iWhere} ORDER BY id DESC {$iLimit}";

        $iImages = $this->model_api->execute_query($iQuery);

        if (!isset($iImages['statuscode']) || $iImages['statuscode'] != 1)

            return error_res("invalid_data");

        if (isset($iImages['data']) && count($iImages['data']) > 0) {

            foreach ($iImages['data'] as $key => $iImage) {

                if (isset($iImage['image']) && !empty($iImage['image']))

                    $iImages['data'][$key]['image_url'] = GREETINGIMAGE_IMAGE_URL.DS.$iImage['image'];

            }

        }

        $iImages = $iImages['data'];

        $iRes = success_res("success");

        $iRes['data'] = $iImages;

        return $iRes;

    }



    function getVideos($param) {

        $iStart = isset($param['start']) ? $param['start'] : 0;

        $iLen = isset($param['len']) ? $param['len'] : 10;

        $searchKey = isset($param['search_key']) ? $param['search_key'] : '';

        $iCategoryId = isset($param['category_id']) ? $param['category_id'] : 0;



        $iLimit = '';

        if ($iStart != '-1')

            $iLimit = "LIMIT {$iStart},{$iLen}";

        $iWhere = " WHERE is_del = 0";

        if ($searchKey != '')

            $iWhere .= " AND name LIKE '%$searchKey%'";

        if ($iCategoryId != 0)

            $iWhere .= " AND category_id = $iCategoryId";



        $iQuery = "SELECT id,name,description,category_id,image,language_id,created_date,modified_date,is_del as status FROM sh_greetingvideo {$iWhere} ORDER BY id DESC {$iLimit}";

        $iVideos = $this->model_api->execute_query($iQuery);

        if (!isset($iVideos['statuscode']) || $iVideos['statuscode'] != 1)

            return error_res("invalid_data");

        if (isset($iVideos['data']) && count($iVideos['data']) > 0) {

            foreach ($iVideos['data'] as $key => $iVideo) {

                if (isset($iVideo['image']) && !empty($iVideo['image']))

                    $iVideos['data'][$key]['image_url'] = GREETINGVIDEO_IMAGE_URL.DS.$iVideo['image'];

            }

        }

        $iVideos = $iVideos['data'];

        $iRes = success_res("success");

        $iRes['data'] = $iVideos;

        return $iRes;

    }

}