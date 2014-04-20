<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $testimonial['id'])); ?>
		<?php endif; ?>
	
		<div id="field-email" class="control-group form-group">
			<div class="controls">
				<?php form_label('Email', 'email'); ?>
				<input class="form-control" type="text" id="email" name="email" placeholder="Enter The Email" value="<?php echo set_value('email', $testimonial['email']); ?>" />
				<?php echo form_error('email'); ?>
			</div>
		</div>
		
		 <div id="field-description" class="control-group form-group">
			<div class="controls">
				<?php form_label('testimonial', 'Testimonial'); ?>
				<textarea class="form-control" rows="5" id="testimonial" name="testimonial" placeholder="Enter Testimonial Here."><?php echo set_value('testimonial', $testimonial['testimonial']); ?></textarea>
				<?php echo form_error('biography'); ?>
			</div>
		</div>

		
	<div id="field-name" class="control-group form-group">
			<div class="controls row" style="float:none; margin: 0 auto;">
				<label><input class="form-control" type="checkbox" id="status" name="status" value="1" checked="checked" />Status</label>
				<?php echo form_error('status'); ?>
				
			</div>
		</div>
				
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('/admin/testimonialMng', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
