<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $transaction['id'])); ?>
		<?php endif; ?>
		
	<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Service Name</th>
			<th>Category Name</th>
			<th>employ Name</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Fixed Price</th>
			<th>Confirm Price</th>
			<th>Confirm</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $transaction['customer_first_name'] ?></td>
			<td><?php echo $transaction['customer_last_name'] ?></td>
			<td><?php echo $transaction['service_name'] ?></td>
			<td><?php echo $transaction['category_name'] ?></td>
			<td><?php echo $transaction['employ_name'] ?></td>
			<td><?php echo $transaction['start_time'] ?></td>
			<td><?php echo $transaction['end_time'] ?></td>
			<td><?php echo $transaction['fixed_price'] ?></td>
			<td><input class="form-control" type="text" id="confirm_price" name="confirm_price" placeholder="Confirm Price" value="<?php echo $transaction['confirm_price']; ?>" />
			</td>
			<td><input class="form-control" type="checkbox" id="status" name="status" value="1" checked="checked" />
				<?php echo form_error('status'); ?>			</td>
		</tr>
	</tbody>
</table>
</div>
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/booking_transaction', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>