<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 27/01/2018
 * Time: 17:22
 */

class Home extends CI_Controller{

    public function index(){
        redirect('users');
    }
}