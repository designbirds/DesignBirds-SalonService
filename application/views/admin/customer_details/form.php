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
		
		<div id="field-small-image" class="control-group form-group">
			<div class="controls">
				<?php form_label('Photo', 'image_name'); ?>
				<input type="file" id="image_name" name="image_name" placeholder="Small image" />
				<?php echo form_error('image_name'); ?>
			</div>
		
		<div id="field-name" class="control-group form-group row">
			<div class="controls row" style="float:none; margin: 0 auto;">
				<div class="col-md-4">
				<label><input class="form-control" type="checkbox" id="imageupload_status" name="imageupload_status" value="1" checked="checked" />Image Status</label>
				<?php echo form_error('imageupload_status'); ?>
				</div>
				<div class="col-md-4">
				<label><input class="form-control" type="checkbox" id="event_status" name="event_status" value="1" checked="checked" />Event Status</label>
				<?php echo form_error('event_status'); ?>
				</div>
				<div class="col-md-4">
				<label><input class="form-control" type="checkbox" id="comment_status" name="comment_status" value="1" checked="checked" />Comment Status</label>
				<?php echo form_error('comment_status'); ?>
				</div>
				
			</div>
		</div>
		
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/customer_details/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>