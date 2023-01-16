<?php
class Model_category extends CI_Model
{

    public function articleList($limit, $offset)
    {
        $q = $this->db->select('id')
            ->from('category')
            ->limit($limit, $offset)
            ->get();
        return $q->result();
    }
}
