<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Store_Model extends CI_Model {

    public function save_store($post) {
        $data = array(
            'store_name' => $post['name'],
            'domain' => $post['domain']
        );
        $this->db->insert('stores', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id != '') {
            return $insert_id;
        } else {
            return FALSE;
        }
    }
    
    public function get_allstore_details(){
         $this->db->order_by('id', 'DESC');
        $get_store = $this->db->get('stores')->result_array();
        if(!empty($get_store)){
            return $get_store;
        }else{
            return FALSE;
        }
    }

    public function store_update($post, $id) {
        $data = array(
            'store_name' => $post['name'],
            'domain' => $post['domain']
        );
        $this->db->where('id', $id);
        return $this->db->update('stores', $data);
    }

    public function store_delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('stores');
    }

    public function change_status_store($id) {

        $this->db->where('id', $id);
        $result = $this->db->get('stores')->row_array();
        $Active = 'Active';
        $Inactive = 'Inactive';
        if ($result['status'] == 'Active') {
            $data = array(
                'status' => $Inactive
            );
        } else {
            $data = array(
                'status' => $Active
            );
        }
        $this->db->where('id', $id);
        $query = $this->db->update('stores', $data);

        if ($query) {
            return TRUE;
        } else {

            return FALSE;
        }
    }

}
