<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 18/01/2018
 * Time: 09:49
 */

class Users extends CI_Controller {

    public function index(){
        //load applicable model
        $this->load->model('users_model');
        //get entire users table
        $result = $this->users_model->get_table();
        //array ready for data passed to view
        $data = [];

        //extract data ready for controller to do something with the data
        foreach ($result as $key=>$value){
            //set data to variables
            $userid = $value['user_id'];
            $username = $value['username'];
            $password = $value['password'];
            $firstname = $value['firstname'];
            $lastname = $value ['lastname'];
            $email = $value ['email'];
            $date_registered = $value ['date_registered'];
            //set data ready for the view
            $data[$key]['username']= $value['username'];
            $data[$key]['date_registered']= $value['date_registered'];
            }
            $data['data'] = $data;
        //load applicable view passing data

        $data['main_view'] = 'users/users_view';
        $this->load->view('layouts/main', $data);
    }

    public function login(){
//        echo "this works";
//        echo $_POST{'username'};
        $this->load->model('users_model');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]');

        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($data);
            redirect('users');
        }else{

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_id = $this->users_model->login_user($username,$password);

            if ($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('login_success','You are now logged in');
                redirect('users');
            }else{
                $this->session->set_flashdata('login_fail','Sorry no login found');
                echo 'failed';
                redirect('users');
            }
        }
    }


    public function logout(){

        $this->session->sess_destroy();
        redirect('users');

    }

}