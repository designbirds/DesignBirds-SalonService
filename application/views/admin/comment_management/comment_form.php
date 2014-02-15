<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $comments['id'])); ?>
		<?php endif; ?>
	
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Type', 'Comment Type'); ?>
				<input type="text" id="comment-type" name="type" placeholder="Type" value="<?php echo set_value('type', $comments['type']); ?>" />
				<?php echo form_error('type'); ?>
			</div>
		</div>
		
		 <div id="field-description" class="control-group">
			<div class="controls">
				<?php form_label('comment', 'Comments'); ?>
				<textarea id="comment" name="comment" placeholder="Enter Comment Here."><?php echo set_value('comment', $comments['comment']); ?></textarea>
				<?php echo form_error('biography'); ?>
			</div>
		</div>
		
		<div id="field-category" class="control-group">
			<div class="controls">
				<?php form_label('Service', 'Service'); ?>
				<input type="text" id="comment-id" name="service" placeholder="Service" value="<?php echo set_value('service', $comments['service']); ?>" />
				<?php echo form_error('comment'); ?>
			</div>
		</div>
		
		
				
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/commentMng/', 'Cancel'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
