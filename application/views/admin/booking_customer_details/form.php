<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>
	
	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $customers['id'])); ?>
			<?php endif; ?>
	
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('first_name', 'customer-first-name'); ?>
				<input class="form-control" type="text" id="customer-first-name" name="first_name" placeholder="Enter The First Name" value="<?php echo set_value('first_name', $customers['first_name']); ?>" />
				<?php echo form_error('first_name'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('last_name', 'customer-last-name'); ?>
				<input class="form-control" type="text" id="customer-last-name" name="last_name" placeholder="Enter The Last Name" value="<?php echo set_value('last_name', $customers['last_name']); ?>" />
				<?php echo form_error('last_name'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Address', 'customer-address'); ?>
				<input class="form-control" type="text" id="customer-address" name="address" placeholder="Enter The Address" value="<?php echo set_value('address', $customers['address']); ?>" />
				<?php echo form_error('address'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Email', 'customer-email'); ?>
				<input class="form-control" type="text" id="customer-email" name="email" placeholder="Enter The Email" value="<?php echo set_value('email', $customers['email']); ?>" />
				<?php echo form_error('email'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Phone-No', 'phone-no'); ?>
				<input class="form-control" type="text" id="customer-phone" name="phone_no" placeholder="Enter The Phone Number" value="<?php echo set_value('phone_no', $customers['phone_no']); ?>" />
				<?php echo form_error('phone_no'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Mobile-No', 'mobile-no'); ?>
				<input class="form-control" type="text" id="customer-mobile" name="mobile_no" placeholder="Enter The Mobile Number" value="<?php echo set_value('mobile_no', $customers['mobile_no']); ?>" />
				<?php echo form_error('mobile_no'); ?>
			</div>
		</div>
				
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/booking_customer_details/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>