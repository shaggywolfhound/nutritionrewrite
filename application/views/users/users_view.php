<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 18/01/2018
 * Time: 09:54
 */
?>
<style>
    table th{
        font-weight: bold;
    }
</style>




<div id="wrapper_admin">
    <div class="col-xs-3">
        <?php if ($this->session->flashdata('login_success')){
            echo $this->session->flashdata('login_success');
            echo '<br>';
        };?>
        <?php if ($this->session->flashdata('login_fail')){
            echo $this->session->flashdata('login_fail');
            echo '<br>';
        };?>

    <?php
    if($this->session->userdata('logged_in')):?>
        <h2>Admin Panel</h2>
        <?php echo form_open ('users/logout'); ?>
        <?php if ($this->session->userdata('username')): ?>
            <p>
                <?php echo  "Username: ".$this->session->userdata('username');?>
            </p>
        <?php endif; ?>
        <?php
        $data = array (
            'class'=> 'btn btn-primary',
            'name'=>'submit',
            'value'=>'Logout'
        );
        ?>
        <?php echo form_submit($data);?>
        <?php echo form_close();?>
    <?php else: ?>

        <h2>Login form</h2>

        <?php $attributes = array ('id'=>'login_form', 'class'=>'form_horizontal'); ?>
        <?php if($this->session->flashdata('errors')): ?>
            <?php echo $this->session->flashdata('errors'); ?>
        <?php endif; ?>

        <?php echo form_open('users/login',$attributes); ?>
        <div class="form-group">
            <?php echo form_label('username');?>
            <?php
            $data = array(
                'class'=>'form-control',
                'name'=>'username',
                'placeholder'=>'Enter Username'
            );
            ?>
            <?php echo form_input($data);?>
        </div>
        <div class="form-group">
            <?php echo form_label('Password');?>
            <?php
            $data = array(
                'class'=>'form-control',
                'name'=>'password',
                'placeholder'=>'Enter Password'
            );
            ?>
            <?php echo form_password($data);?>
        </div>
        <div class="form-group">
            <?php echo form_label('Confirm Password');?>
            <?php
            $data = array(
                'class'=>'form-control',
                'name'=>'confirm_password',
                'placeholder'=>'Confirm Password'
            );
            ?>
            <?php echo form_password($data);?>
        </div>
        <div class="form-group">
            <?php
            $data = array(
                'class'=>'btn btn-primary',
                'name'=>'submit',
                'value'=>'Login'
            );
            ?>
            <?php echo form_submit($data);?>
        </div>
        <?php echo form_close(); ?>

    <?php endif; ?>
    </div>
</div>
