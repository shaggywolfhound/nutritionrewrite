<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 18/01/2018
 * Time: 16:13
 */

include 'assets/variables.php';?>
<div id="wrapper_view" class="item_new">

    <?php if($this->session->userdata('logged_in')):?>
    <h1>items new page</h1>

    <?php if($this->session->flashdata('errors')): ?>
        <?php echo $this->session->flashdata('errors'); ?>
    <?php endif; ?>
    <?php if ($this->session->flashdata('item_added')){
        echo $this->session->flashdata('item_added');
        echo '<br>';
    };?>
    <?php if ($this->session->flashdata('item_added')){
        echo $this->session->flashdata('item_not_added');
        echo '<br>';
    };?>
    <a href="<?php echo base_url(); ?>items">Go to Items page</a>

    <?php
    $attributes = array ('id'=>'new_item_form', 'class'=>'form_horizontal');

    echo form_open ('items/new_item',$attributes);
    //remove product_id from form input array
    $key = array_search('product_id',$result);
    unset($result[$key]);

    foreach ($result as $key => $value){
        echo '<div class="form-group">';
        if ($value == 'prod_name'){
            echo form_label("$item_names[$value]");
            $data = array(
                'class'=>'form-control',
                'name'=>"$value",
                'value'=>'Product Name'
            );
        }else {
            echo form_label("$item_names[$value]");
            $data = array(
                'class' => 'form-control',
                'name' => "$value",
                'value' => '0.0'
            );
        }
        echo form_input($data);
        echo '</div>';
    }
    ?>

    <?php
    $data = array (
        'class'=> 'btn btn-primary',
        'name'=>'submit',
        'value'=>'Submit'
    );
    ?>
    <?php echo form_submit($data);?>
    <?php echo form_close();?>

    <?php else: ?>
        <h1>Sorry you are not logged in please go <a href="<?php echo base_url();?>users">here</a> and login.</h1>
    <?php endif; ?>
</div>