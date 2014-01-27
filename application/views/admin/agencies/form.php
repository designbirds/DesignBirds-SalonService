
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>
	
	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $agency['id'])); ?>
			<?php echo form_hidden('lastupdated', set_value('lastupdated', $agency['lastupdated'])); ?>
			<?php echo form_hidden('photo_icon', set_value('photo_icon', $agency['photo_icon'])); ?>
			<?php echo form_hidden('photo_profile', set_value('photo_profile', $agency['photo_profile'])); ?>
			<?php endif; ?>
	
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Name', 'agency-name'); ?>
				<input type="text" id="agency-name" name="name" placeholder="Name" value="<?php echo set_value('name', $agency['name']); ?>" />
				<?php echo form_error('name'); ?>
			</div>
		</div>
		<div id="field-userfile" class="control-group">
			<div class="controls">
				<?php form_label('Photo', 'agency-icon-ldpi'); ?>
				<input type="file" id="agency-icon-ldpi" name="icon-ldpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'agency-icon-mdpi'); ?>
				<input type="file" id="agency-icon-mdpi" name="icon-mdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'agency-icon-hdpi'); ?>
				<input type="file" id="agency-icon-hdpi" name="icon-hdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'agency-icon-xhdpi'); ?>
				<input type="file" id="agency-icon-xhdpi" name="icon-xhdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'agency-profile-ldpi'); ?>
				<input type="file" id="agency-profile-ldpi" name="profile-ldpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'agency-profile-mdpi'); ?>
				<input type="file" id="agency-profile-mdpi" name="profile-mdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'agency-profile-hdpi'); ?>
				<input type="file" id="agency-profile-hdpi" name="profile-hdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'agency-profile-xhdpi'); ?>
				<input type="file" id="agency-profile-xhdpi" name="profile-xhdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
		</div>
		
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/agencies/', 'Cancel'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
