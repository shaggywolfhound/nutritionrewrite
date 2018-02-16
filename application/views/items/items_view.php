
<div id="wrapper_view" class="items">

    <?php if($this->session->userdata('logged_in')):?>
    <h1>items view page</h1>

        <?php $attributes = array ('id'=>'login_form', 'class'=>'form_horizontal'); ?>
        <?php if($this->session->flashdata('errors')): ?>
            <?php echo $this->session->flashdata('errors'); ?>
        <?php endif; ?>

    <div class="searchBox">
        <form action="items/search/data" method="get">
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

    <a href="<?php echo base_url(); ?>items/new">Add new item</a>

    <div class="pages">
        <label>Number of items per page: </label>
        <select>
            <option value="<?php echo base_url(); ?>items/limit/data?numberOf=20" class="numberof">20 items</option>
            <option value="<?php echo base_url(); ?>items/limit/data?numberOf=50" class="numberof">50 items</option>
            <option value="<?php echo base_url(); ?>items/limit/data/?numberOf=100" class="numberof">100 items</option>
            <option value="<?php echo base_url(); ?>items/limit/data/?numberOf=200" class="numberof">200 items</option>
        </select>
    </div>

    <table>
        <th><a href="<?php echo base_url(); ?>items/sortby/product_id">Product ID</a></th>
        <th><a href="<?php echo base_url(); ?>items/sortby/prod_name">Product Name</a></th>
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
