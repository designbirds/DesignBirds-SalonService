<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $contents['id'])); ?>
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
		
		 <div id="field-description" class="control-group form-group">
			<div class="controls">
				<?php form_label('small_content', 'small_content'); ?>
				<textarea class="form-control" rows="5" id="small_content" name="small_content" placeholder="Enter small content here."><?php echo set_value('small_content', $contents['small_content']); ?></textarea>
				<?php echo form_error('small_content'); ?>
			</div>
		</div>
		
		<div id="field-description" class="control-group form-group">
			<div class="controls">
				<?php form_label('large_content', 'large_content'); ?>
				<textarea class="form-control" rows="5" id="large_content" name="large_content" placeholder="Enter Large Content Here."><?php echo set_value('large_content', $contents['large_content']); ?></textarea>
				<?php echo form_error('large_content'); ?>
			</div>
		</div>
		<div id="field-description" class="control-group form-group">
			<div class="controls">
				<?php form_label('image_content', 'image_content'); ?>
				<textarea class="form-control" rows="5" id="image_content" name="image_content" placeholder="Enter Image Content Here."><?php echo set_value('image_content', $contents['image_content']); ?></textarea>
				<?php echo form_error('image_content'); ?>
			</div>
		</div>
		
		<div id="field-name" class="control-group form-group row">
			<div class="controls row" style="float:none; margin: 0 auto;">
				<div class="col-md-4">
				<label><input class="form-control" type="checkbox" id="status" name="status" value="1" checked="checked" />Status</label>
				<?php echo form_error('status'); ?>
				</div>
			</div>
		</div>
		
	</fieldset>
<div class="form-group"></div>
	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/content_management/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
