<?php if(@$status):?>
	<label class="badge" style="background-color: <?php echo $status->bg ?>;color: <?php echo $status->color ?>">
		<?php echo $status->get_name()?>
	</label> 
<?php endif;?>