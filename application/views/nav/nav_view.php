<?php
/**
 *  * Created by PhpStorm.
 * User: Rob Hannaford
 * Date: 24/01/2018
 * Time: 20:40
 */
?>
<div id="wrapper">
    <h1> Navigation</h1>
    <ul>
        <li><a href="#">Home</a></li>

        <?php if($this->session->userdata('logged_in')):?>
        <li><a href="<?php echo base_url();?>items">Items</a></li>
        <li><a href="#">Recipe</a></li>
        <li><a href="#">Diary</a></li>
        <li><a href="#">Analysis</a></li>
        <?php endif; ?>

        <?php if($this->session->userdata('logged_in')):?>
        <li><a href="<?php echo base_url();?>users">Admin Panel</a></li>
        <?php else: ?>
        <li><a href="<?php echo base_url();?>users">Login</a></li>
        <?php endif; ?>
    </ul>
</div>