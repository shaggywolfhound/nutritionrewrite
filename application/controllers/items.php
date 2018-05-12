<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 18/01/2018
 * Time: 12:07
 */

include 'assets/variables.php';

class Items extends CI_Controller{

    public function index(){
        $numberOfRecords = $this->items_model->items_number();
        $data = $this->input->get();
        //need to also check if got correct variables and not wrong ones
        if (!(empty($data))&&array_key_exists('numberOf',$data)&&array_key_exists('sortby',$data)&&array_key_exists('sortdir',$data)&&array_key_exists('pageno',$data)){
            $result = $this->items_model->get_items_with_limit($data);
        }else{
            $data['numberOf'] = '20';
            $data['sortby'] = 'product_id';
            $data['sortdir'] = 'asc';
            $data['pageno'] = '1';
            $result = $this->items_model->get_items_with_limit($data);
        }
        $data['numberOfRecords'] = $numberOfRecords;
        $data['result'] = $result;
        $data['main_view'] = 'items/items_view';
        $this->load->view('layouts/main', $data);
    }

    public function edit($id){
        if (isset($id)) {
            //$this->load->model('items_model');
            $result = $this->items_model->get_item_details($id);
            $data['result'] = $result;
        }
        $data['main_view'] = 'items/item_edit_view';
        $this->load->view('layouts/main', $data);
    }

    public function new(){
        //$this->load->model('items_model');
        //$result = $this->items_model->get_all();
        $result = $this->items_model->list_fields();
        $data['result'] = $result;
        $data['main_view'] = 'items/item_new_view';
        $this->load->view('layouts/main', $data);
    }

    public function new_item(){
        global $item_names;
        //get table column names for validation rules
        $table_names = $this->items_model->list_fields();

        //setup rules to check
        foreach ($table_names as $key=>$value) {
            if ($value == 'prod_name') {
                $this->form_validation->set_rules("$value", "$item_names[$value]", 'trim|required|min_length[6]');
            }elseif($value == 'product_id') {
            }
            else{
                $this->form_validation->set_rules("$value", "$item_names[$value]", 'trim|required|numeric');
            }
        }
        //run validation and push errors as an array to view
        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($data);
            redirect('items/new');
        }

        //echo ($this->input->post('prod_name'));
        //add item to database
        $input = $this->input->post();
        $success = $this->items_model->add_item($input);
        if ($success){
            $this->session->set_flashdata('item_added','Item was added successfully');
        } else {
            $this->session->set_flashdata('item_not_added','Sorry your item failed to be added');
        }
        redirect('items/new');

    }

    public function edit_item($id){
        global $item_names;
        //get table column names for validation rules
        $table_names = $this->items_model->list_fields();

        //setup rules to check
        foreach ($table_names as $key=>$value) {
            if ($value == 'prod_name') {
                $this->form_validation->set_rules("$value", "$item_names[$value]", 'trim|required|min_length[6]');
            }elseif($value == 'product_id') {
            }
            else{
                $this->form_validation->set_rules("$value", "$item_names[$value]", 'trim|required|numeric');
            }
        }
        //run validation and push errors as an array to view
        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($data);
            redirect("items/edit/$id");
        }
        $input = $this->input->post();
        $input['product_id'] = $id;

        $success = $this->items_model->update_item($input);
        if ($success){
            $this->session->set_flashdata('item_updated','Item was updated successfully');
        } else {
            $this->session->set_flashdata('item_not_updated','Sorry your item was not updated');
        }
        redirect("items/edit/$id");
    }

    public function delete($id){
        $success = $this->items_model->remove_item($id);
        if ($success){
            $this->session->set_flashdata('item_deleted','Item was deleted successfully');
        } else {
            $this->session->set_flashdata('item_not_deleted','Sorry your item was not deleted');
        }
        redirect("items");
    }

    public function search(){

        $this->form_validation->set_rules("search", "Search term", 'required');
        $this->form_validation->run();

        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($data);

        }
        $search = $this->input->get();

        $search = $search['search'];

        $result = $this->items_model->search_items($search);

        $data['result'] = $result;
        $data['main_view'] = 'items/item_search_view';
        $this->load->view('layouts/main', $data);
    }

}
