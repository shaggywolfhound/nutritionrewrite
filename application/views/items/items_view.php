
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
    <div id="Sorting">
        <div class="itemsDisplayed">
            <label>Number of items: </label>
            <select>
                <option value="numberOf=20" class="numberof" selected>20 items</option>
                <option value="numberOf=50" class="numberof" >50 items</option>
                <option value="numberOf=100" class="numberof" >100 items</option>
                <option value="numberOf=200" class="numberof" >200 items</option>
            </select>
        </div>
        <div class="sortBy">
            <label>Sort By: </label>
            <select>
                <option value="sortby=product_id" class="sortByType" selected>Product Id</option>
                <option value="sortby=prod_name" class="sortByType">Product Name</option>
            </select>
        </div>
        <div class="sortDirection">
            <label>Sort Direction</label>
            <select>
                <option value="sortdir=asc" class="sortDir" selected>Ascending</option>
                <option value="sortdir=desc" class="sortDir">Descending</option>
            </select>
        </div>
        <div class="pageNumber">
            <label>Page Number</label>
            <select>
                <option value="pageno=1" class="pageno" selected>1</option>
                <option value="pageno=2" class="pageno">2</option>
            </select>
        </div>
    </div>

    <table>
        <th><a class="prodIdSelect" href="">Product ID</a></th>
        <th><a class="prodNameSelect" href="">Product Name</a></th>
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
