<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 18/01/2018
 * Time: 09:58
 */

class Users_model extends CI_Model {

    public function get_table(){
        //$data = $this->db->query('SELECT * FROM user_login');
        $data = $this->db->get('user_login');
        return $data->result_array();

    }

    public function login_user($username,$password) {

        $this->db->where('username',$username);
        $this->db->where('password',$password);

        $result = $this->db->get('user_login');

        if ($result->num_rows() == 1) {
            return $result->row(0)->user_id;
        }else{
            return false;
        }
    }

}
