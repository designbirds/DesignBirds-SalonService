<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $imageupload['id'])); ?>
		<?php endif; ?>
		
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Name', 'Image Name'); ?>
				<div id="image-name" name="name" value="<?php echo set_value('name', $imageupload['name']); ?>" ></div>
				<?php echo form_error('name'); ?>
			</div>
		</div>
		
		<div id="field-small-image" class="control-group">
			<div class="controls">
				<?php form_label('Photo', 'image_name'); ?>
				<input type="file" id="image_name" name="image_name" placeholder="Small image" />
				<?php echo form_error('image_name'); ?>
			</div>
		</div>
 
	</fieldset>
<div class="form-group"></div>
	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/banner_design/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
