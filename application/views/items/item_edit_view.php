<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 18/01/2018
 * Time: 14:04
 */

include 'assets/variables.php';?>
<div id="wrapper">

    <?php if($this->session->userdata('logged_in')):?>

    <h1>items new page</h1>
    <?php if($this->session->flashdata('errors')): ?>
        <?php echo $this->session->flashdata('errors'); ?>
    <?php endif; ?>
    <?php if ($this->session->flashdata('item_added')){
        echo $this->session->flashdata('item_added');
        echo '<br>';
    };?>
    <?php if ($this->session->flashdata('item_not_added')){
        echo $this->session->flashdata('item_not_added');
        echo '<br>';
    };?>
    <?php if ($this->session->flashdata('item_updated')){
        echo $this->session->flashdata('item_updated');
        echo '<br>';
    };?>
    <?php if ($this->session->flashdata('item_not_updated')){
        echo $this->session->flashdata('item_not_updated');
        echo '<br>';
    };?>
    <a href="<?php echo base_url(); ?>items">Go to Items page</a>

    <?php
    //transfer to new array, since all values at index[0]
    $productData = $result[0];
    $id = $productData['product_id'];

    $attributes = array ('id'=>'edit_item_form', 'class'=>'form_horizontal');

    //start form
    echo form_open ("items/edit_item/$id",$attributes);

    //remove product_id from form input array
    if (array_key_exists('product_id',$productData)){
        unset ($productData['product_id']);
    }
    foreach ($productData as $key => $value){
        echo '<div class="form-group">';
        echo form_label("$item_names[$key]");
        $data = array(
            'class'=>'form-control',
            'name'=>"$key",
            'value'=>"$value"
        );
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

    <?php else:; ?>
        <h1>Sorry you are not logged in please go <a href="<?php echo base_url();?>users">here</a> and login.</h1>
    <?php endif; ?>

</div>
