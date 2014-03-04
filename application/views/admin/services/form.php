<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>
	
	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $service['id'])); ?>
			<?php endif; ?>
	
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Name', 'service-name'); ?>
				<input class="form-control" type="text" id="service-name" name="name" placeholder="Service Name" value="<?php echo set_value('name', $service['name']); ?>" />
				<?php echo form_error('name'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Name', 'service-description'); ?>
				<textarea class="form-control" rows="5" id="service-description" name="description" placeholder="Service description" ><?php echo set_value('description', $service['description']); ?></textarea>
				<?php echo form_error('description'); ?>
			</div>
		</div>
		
		
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/features/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>