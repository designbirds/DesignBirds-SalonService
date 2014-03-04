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
	
		<div id="field-name" class="control-group form-group">
			<div class="controls">
				<?php form_label('Type', 'Comment Type'); ?>
				<input class="form-control" type="text" id="comment-type" name="type" placeholder="Type" value="<?php echo set_value('type', $comments['type']); ?>" />
				<?php echo form_error('type'); ?>
			</div>
		</div>
		
		 <div id="field-description" class="control-group form-group">
			<div class="controls">
				<?php form_label('comment', 'Comments'); ?>
				<textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Enter Comment Here."><?php echo set_value('comment', $comments['comment']); ?></textarea>
				<?php echo form_error('biography'); ?>
			</div>
		</div>
		
		<div id="field-category" class="control-group form-group">
			<div class="controls">
				<?php form_label('category_id', 'category_id'); ?>
				<input class="form-control" type="text" id="category_id" name="category_id" placeholder="Category" value="<?php echo set_value('category_id', $comments['category_id']); ?>" />
				<?php echo form_error('category_id'); ?>
			</div>
		</div>
		
		
				
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/commentMng/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
