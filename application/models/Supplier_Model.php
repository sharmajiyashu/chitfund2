<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_Model extends CI_Model {

    public function save_supplier($post) {
        $data = array(
            'first_name' => $post['fname'],
            'last_name' => $post['lname'],
            'email' => $post['email'],
            'phone_no' => $post['phone'],
            'gst_no' => $post['gst_no'],
            'company_name' => $post['company'],
            'address' => $post['address'],
            'city' => $post['city'],
            'state' => $post['state'],
            'country' => $post['country'],
            'payment_terms' => $post['payment_terms']
        );
        $this->db->insert('suppliers', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id != '') {

            return $insert_id;
        } else {
            return FALSE;
        }
    }

    public function get_allsuppliers() {
        $this->db->order_by('id', 'DESC');
        $get_supplier = $this->db->get('suppliers')->result_array();
        if (!empty($get_supplier)) {

            return $get_supplier;
        } else {
            return FALSE;
        }
    }

    public function supplier_delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('suppliers');
    }

    public function supplier_update($post, $id) {
        $data = array(
            'first_name' => $post['fname'],
            'last_name' => $post['lname'],
            'email' => $post['email'],
            'phone_no' => $post['phone'],
            'gst_no' => $post['gst_no'],
            'company_name' => $post['company'],
            'address' => $post['address'],
            'city' => $post['city'],
            'state' => $post['state'],
            'country' => $post['country'],
            'payment_terms' => $post['payment_terms']
        );
        $this->db->where('id', $id);
        return $this->db->update('suppliers', $data);
    }

    public function change_status_supplier($id) {

        $this->db->where('id', $id);
        $result = $this->db->get('suppliers')->row_array();
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
        $query = $this->db->update('suppliers', $data);

        if ($query) {
            return TRUE;
        } else {

            return FALSE;
        }
    }

}
