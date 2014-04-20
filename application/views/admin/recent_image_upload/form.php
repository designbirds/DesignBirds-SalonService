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
		
		<div id="field-name" class="control-group">	
			<div class="controls">
			<div class="form-group">
				<input type="hidden" name="hidid" value="<?php echo $service['id']; ?>">
				<?php echo form_dropdown('service_id', $dropdown_service, set_value('name', $service['name']),'class="form-control" id="service_name"'); ?>
			</div>
			</div>
		</div>
		<!-- For replaced and displayed -->
		<div class="form-group" id="category_name"><select class="form-control"><option value=''>Select a category</option></select></div>
		
		<!-- div id="field-name" class="control-group">	
			<div class="controls">
			<div>
				<input type="hidden" name="hidid" value="<?php //echo $services['id']; ?>">
				<?php //echo form_dropdown('name', $dropdown_services, set_value('name', $imageupload['name'])); ?>
			</div>
		
			</div>
		</div>
		
		<div id="field-name" class="control-group">	
			<div class="controls">
			<div>
				<input type="hidden" name="hidid" value="<?php //echo $hairdress['id']; ?>">
				<?php //echo form_dropdown('name', $dropdown_hairdress, set_value('name', $imageupload['name'])); ?>
			</div>
		
			</div>
		</div-->	
		
		 <div id="field-description" class="control-group form-group">
			<div class="controls">
				<?php form_label('description', 'imasge-description'); ?>
				<textarea class="form-control" rows="5" id="imasge-description" name="description" placeholder="Enter imasge description here."><?php echo set_value('description', $imageupload['description']); ?></textarea>
				<?php echo form_error('biography'); ?>
			</div>
		</div>
		
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Alt', 'Image Alt'); ?>
				<input class="form-control" type="text" id="image-alt" name="alt" placeholder="Alt" value="<?php echo set_value('alt', $imageupload['alt']); ?>" />
				<?php echo form_error('alt'); ?>
			</div>
		</div>
		
		<div id="field-small-image" class="control-group">
			<div class="controls">
				<?php form_label('Photo', 'image_name'); ?>
				<input type="file" id="image_name" name="image_name" placeholder="Small image" />
				<?php echo form_error('image_name'); ?>
			</div>
		</div>
<!--   <div id="field-biography" class="control-group">
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
<div class="form-group"></div>
	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/recent_imageUpload/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
