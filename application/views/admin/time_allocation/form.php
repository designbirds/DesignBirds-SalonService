<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $time_allocation['id'])); ?>
		<?php endif; ?>
		
	<div id="field-name" class="control-group">	
		<div class="controls">
			<div class="form-group">
				<input type="hidden" name="hidid" value="<?php echo $employ['id']; ?>">
				<?php echo form_dropdown('employ_id', $dropdown_employs, set_value('employ_id', $time_allocation['employ_id']),'class="form-control" id="employ_name"'); ?>
			</div>
		</div>
	</div>
		
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
			
		
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Start Time', 'start_time'); ?>
				<input class="form-control" type="text" id="datetimepicker_mask" name="start_time" placeholder="Start Time" value="<?php echo $time_allocation['start_time']; ?>" />
				<?php echo form_error('start_time'); ?>
			</div>
		</div>
		
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('End Time', 'end_time'); ?>
				<input class="form-control" type="text" id="datetimepicker_mask1" name="end_time" placeholder="End Time" value="<?php echo $time_allocation['end_time']; ?>" />
				<?php echo form_error('end_time'); ?>
			</div>
		</div>
		
				<div id="field-name" class="control-group form-group row">
			<div class="controls row" style="float:none; margin: 0 auto;">
				<div class="col-md-4">
				<label><input class="form-control" type="checkbox" id="status" name="status" value="1" />Confirmed</label>
				<?php echo form_error('status'); ?>
				</div>
			</div>
		</div>
		
	

	</fieldset>
<div class="form-group"></div>
	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/user_time_allocation/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
