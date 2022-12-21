<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    public function add_products($post,$filename) {
        $data = array(
            'title' => $post['title'],
            'description' => $post['description'],
            'image_link' =>$filename,
            'sku' => $post['sku'],
            'barcode' => $post['barcode'],
            'quantity' => $post['quantity'],
            'compare_price' => $post['compare_at_price'],
            'price' => $post['price'],
            'cost' => $post['cost'],
            'country' => $post['country'],
            'weight' => $post['weight'],
            'weight_unit' => $post['weight_unit'],
            'tag' => $post['tag'],
            'vendor' => $post['vendor'],
            'product_type' => $post['category'],
            'tax' => $post['tax']
        );
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id != '') {
            return $insert_id;
        } else {
            return FALSE;
        }
    }

    public function get_allproducts() {
        $this->db->order_by('id', 'DESC');
        $get_products = $this->db->get('products')->result_array();
        if (!empty($get_products)) {

            return $get_products;
        } else {
            return FALSE;
        }
    }

    public function products_delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function products_update($post, $filename, $id) {
        $data = array(
           'title' => $post['title'],
            'description' => $post['description'],
            'image_link' =>$filename,
            'sku' => $post['sku'],
            'barcode' => $post['barcode'],
            'quantity' => $post['quantity'],
            'compare_price' => $post['compare_at_price'],
            'price' => $post['price'],
            'cost' => $post['cost'],
            'country' => $post['country'],
            'weight' => $post['weight'],
            'weight_unit' => $post['weight_unit'],
            'tag' => $post['tag'],
            'vendor' => $post['vendor'],
            'product_type' => $post['category'],
            'tax' => $post['tax']
        );
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function change_status_products($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('products')->row_array();
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
        $query = $this->db->update('products', $data);
        if ($query) {
            return TRUE;
        } else {

            return FALSE;
        }
    }
    
    public function saverecords($value){
        
        $data =array(
                    
                    'title' =>  $title = $value[0],
                    'description' => $description = $value[1],
                    'product_type'  =>  $category = $value[2],
                    'vendor' => $vendor =$value[3],
                    'tag' => $tag =$value[4],
                    'price' =>  $price = $value[5],
                    'compare_price' => $compare_price = $value[6],
                    'cost' => $cost =$value[7],
                    'sku' => $sku= $value[8],
                    'barcode' => $barcode =$value[9],
                    'weight' => $weight =$value[10],
                    'weight_unit' =>  $weight_unit = $value[11],
                    'quantity' => $quantity = $value[12],
                    'country' => $country =$value[13]
                );

           $this->db->insert('products',$data);
    }
}
