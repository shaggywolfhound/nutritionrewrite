<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 27/01/2018
 * Time: 18:35
 */
?>

<div id="wrapper_view" class="item_search">

    <?php if($this->session->userdata('logged_in')):?>
    <h1>Search results page</h1>

        <?php $attributes = array ('id'=>'login_form', 'class'=>'form_horizontal'); ?>
        <?php if($this->session->flashdata('errors')): ?>
            <?php echo $this->session->flashdata('errors'); ?>
        <?php endif; ?>


        <div class="searchBox">
            <form action="<?php echo base_url()?>items/search/data" method="get">
                <div class="form-group">
                    <?php echo form_label('Search');?>
                    <?php
                    $data = array(
                        'class'=>'form-control',
                        'name'=>'search',
                        'placeholder'=>'Search here'
                    );
                    ?>
                    <?php echo form_input($data);?>
                </div>
                <div class="form-group">
                    <?php
                    $data = array(
                        'class'=>'btn btn-primary',
                        'name'=>'submit',
                        'value'=>'Submit'
                    );
                    ?>
                    <?php echo form_submit($data);?>
                </div>
            </form>
        </div>

    <?php if ($this->session->flashdata('item_deleted')){
        echo $this->session->flashdata('item_deleted');
        echo '<br>';
    };?>
    <?php if ($this->session->flashdata('item_not_deleted')){
        echo $this->session->flashdata('item_not_deleted');
        echo '<br>';
    };?>

    <a href="<?php echo base_url(); ?>items">Back to items page</a>

    <table>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Adjust</th>
        <th>Remove</th>
        <?php
        //output item data
        foreach ($result as $key=>$value):?>
            <tr>
                <td><?php echo ($value['product_id']); ?></td>
                <td><?php echo ($value['prod_name']); ?></td>
                <td><a href="<?php echo base_url();?>items/edit/<?php echo ($value['product_id']);?>">Edit</a></td>
                <td><a href="<?php echo base_url();?>items/delete/<?php echo ($value['product_id']);?>">Delete</a></td>
            </tr>
        <?php endforeach;?>
    </table>

    <?php else: ?>
        <h1>Sorry you are not logged in please go <a href="<?php echo base_url();?>users">here</a> and login.</h1>
    <?php endif; ?>
</div>