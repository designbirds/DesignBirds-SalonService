
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $imageupload['id'])); ?>
			<?php echo form_hidden('name', set_value('name', $imageupload['name'])); ?>
			<?php echo form_hidden('category_id', set_value('category_id', $imageupload['category_id'])); ?>
			<?php echo form_hidden('description', set_value('description', $imageupload['description'])); ?>
		<?php endif; ?>
	
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Name', 'Image Name'); ?>
				<input type="text" id="image-name" name="name" placeholder="Name" value="<?php echo set_value('name', $imageupload['name']); ?>" />
				<?php echo form_error('name'); ?>
			</div>
		</div>
		
		<div id="field-category" class="control-group">
			<div class="controls">
				<?php form_label('Name', 'category_id'); ?>
				<input type="text" id="image-category-id" name="category" placeholder="category" value="<?php echo set_value('category_id', $imageupload['category_id']); ?>" />
				<?php echo form_error('category_id'); ?>
			</div>
		</div>
		

		<!--  <div id="field-biography" class="control-group">
			<div class="controls">
				<?php form_label('Biography', 'tipster-biography'); ?>
				<textarea id="tipster-biography" name="biography" placeholder="Enter Tipster bio here."><?php echo set_value('biography', $imageupload['biography']); ?></textarea>
				<?php echo form_error('biography'); ?>
			</div>
		</div>
		
		<div id="field-userfile" class="control-group">
			<div class="controls">
				<?php form_label('Photo', 'tipster-icon-ldpi'); ?>
				<input type="file" id="tipster-icon-ldpi" name="icon-ldpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'tipster-icon-mdpi'); ?>
				<input type="file" id="tipster-icon-mdpi" name="icon-mdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'tipster-icon-hdpi'); ?>
				<input type="file" id="tipster-Icon-hdpi" name="icon-hdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'tipster-icon-xhdpi'); ?>
				<input type="file" id="tipster-Icon-xhdpi" name="icon-xhdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'tipster-profile-ldpi'); ?>
				<input type="file" id="tipster-profile-ldpi" name="profile-ldpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'tipster-profile-mdpi'); ?>
				<input type="file" id="tipster-profile-mdpi" name="profile-mdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'tipster-profile-hdpi'); ?>
				<input type="file" id="tipster-profile-hdpi" name="profile-hdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div>
			<div class="controls">
				<?php form_label('Photo', 'tipster-profile-xhdpi'); ?>
				<input type="file" id="tipster-profile-xhdpi" name="profile-xhdpi" placeholder="photo" />
				<?php echo form_error('userfile'); ?>
			</div> -->
		</div>  
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/tipsters/', 'Cancel'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
