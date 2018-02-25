<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 18/01/2018
 * Time: 12:12
 */
class Items_model extends CI_Model{

    public function get_items () {
        $this->db->select(['product_id','prod_name']);
        $this->db->order_by('prod_name','asc');
        $food_items = $this->db->get('food_item');
        $result = $food_items->result_array();
        return $result;
    }

    public function items_number(){
        return $this->db->count_all('food_item');
    }

    public function get_items_with_limit ($data) {
        $numberOf = $data['numberOf'];//20
        $sortby = $data['sortby'];
        $sortdir = $data['sortdir'];
        $pageno = $data['pageno'];//1

        $this->db->select(['product_id','prod_name']);
        $this->db->order_by($sortby,$sortdir);

        //depends on numberOf and page number
        $startatres = (($numberOf*$pageno)-$numberOf);
        $numberofres = ($numberOf);

        if($startatres == 0){
            $this->db->limit($numberofres);
        }else {
            $this->db->limit($numberofres, $startatres);
        }
        $food_items = $this->db->get('food_item');
        $result = $food_items->result_array();
        return $result;
    }


    public function get_items_sort ($id){
        $this->db->select(['product_id','prod_name']);
        $this->db->order_by("$id",'asc');
        $food_items = $this->db->get('food_item');
        $result = $food_items->result_array();
        return $result;
    }

    public function get_item_details($id){
        $this->db->where(['product_id' => $id]);
        $food_items = $this->db->get('food_item');
        $result = $food_items->result_array();
        return $result;
    }

    public function get_all(){
        $food_items = $this->db->get('food_item');
        $result = $food_items->result_array();
        return $result;
    }
    public function list_fields(){
        $food_items = $this->db->get('food_item');
        $result = $food_items->list_fields();
        return $result;
    }
    public function add_item($input){
        unset($input['submit']);
        $add_food_item = $this->db->insert('food_item',$input);
        return $add_food_item;
    }
    public function update_item($input){
        unset($input['submit']);
        $id = $input['product_id'];
        $this->db->where(['product_id' => $id]);
        $update_food_item = $this->db->replace('food_item',$input);
        return $update_food_item;
    }
    public function remove_item ($id){
        $this->db->where(['product_id' => $id]);
        $delete_item = $this->db->delete('food_item');
        return $delete_item;
    }
    public function search_items($search=' '){
        $this->db->like('prod_name',"$search");

        $this->db->select(['product_id','prod_name']);
        $this->db->order_by("prod_name",'asc');
        $search_items = $this->db->get('food_item');

        $result = $search_items->result_array();
        return $result;

    }
}