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
	
		<div id="field-email" class="control-group form-group">
			<div class="controls">
				<?php form_label('Email', 'email'); ?>
				<input class="form-control" type="text" id="email" name="email" placeholder="Enter The Email" value="<?php echo set_value('email', $comments['email']); ?>" />
				<?php echo form_error('email'); ?>
			</div>
		</div>
		
		 <div id="field-description" class="control-group form-group">
			<div class="controls">
				<?php form_label('comment', 'Comments'); ?>
				<textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Enter Comment Here."><?php echo set_value('comment', $comments['comment']); ?></textarea>
				<?php echo form_error('biography'); ?>
			</div>
		</div>	
				
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('/frontend/index', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
