<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>
	
	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $employ['id'])); ?>
			<?php endif; ?>
	
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('First-Name', 'first-name'); ?>
				<input class="form-control" type="text" id="first_name" name="first_name" placeholder="Enter The First Name" value="<?php echo set_value('first_name', $employ['first_name']); ?>" />
				<?php echo form_error('first_name'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Last-Name', 'last-name'); ?>
				<input class="form-control" type="text" id="last_name" name="last_name" placeholder="Enter The Last Name" value="<?php echo set_value('last_name', $employ['last_name']); ?>" />
				<?php echo form_error('last_name'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Address', 'customer-address'); ?>
				<input class="form-control" type="text" id="customer-address" name="address" placeholder="Enter The Address" value="<?php echo set_value('address', $employ['address']); ?>" />
				<?php echo form_error('address'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Email', 'customer-email'); ?>
				<input class="form-control" type="text" id="customer-email" name="email" placeholder="Enter The Email" value="<?php echo set_value('email', $employ['email']); ?>" />
				<?php echo form_error('email'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Phone-No', 'phone-no'); ?>
				<input class="form-control" type="text" id="customer-phone" name="telephone" placeholder="Enter The Phone Number" value="<?php echo set_value('telephone', $employ['telephone']); ?>" />
				<?php echo form_error('telephone'); ?>
			</div>
		</div>
	
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/employee_details/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>