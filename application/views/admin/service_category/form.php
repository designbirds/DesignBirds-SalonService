
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>
	
	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $service_category['id'])); ?>
			<?php echo form_hidden('service_id', set_value('service_id', $service_category['service_id'])); ?>
			<?php endif; ?>
	
		<div id="field-name" class="control-group">	
			<div class="controls">
			<div>
				<input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">
				<?php echo form_dropdown('name', $dropdown_service, $service['name']); ?>
			</div>
			</div>
		</div>
	
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Name', 'service-category-name'); ?>
				<input type="text" id="service-category-name" name="name" placeholder="Service Category Name" value="<?php echo set_value('name', $service_category['name']); ?>" />
				<?php echo form_error('name'); ?>
			</div>
		</div>
		
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Name', 'service-category-description'); ?>
				<input type="text" id="service-category-description" name="description" placeholder="Service Category description" value="<?php echo set_value('description', $service_category['description']); ?>" />
				<?php echo form_error('description'); ?>
			</div>
		</div>
		
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/service_category/', 'Cancel'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
