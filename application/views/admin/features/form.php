<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>
	
	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $feature['id'])); ?>
			<?php endif; ?>
	
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Name', 'feature-name'); ?>
				<input type="text" id="feature-name" name="name" placeholder="Name" value="<?php echo set_value('name', $feature['name']); ?>" />
				<?php echo form_error('name'); ?>
			</div>
		</div>
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Name', 'feature-description'); ?>
				<input type="text" id="feature-desc" name="description" placeholder="Feature description" value="<?php echo set_value('description', $feature['description']); ?>" />
				<?php echo form_error('description'); ?>
			</div>
		</div>
		
		
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/features/', 'Cancel'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>