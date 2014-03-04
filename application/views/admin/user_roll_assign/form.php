<div class="form-group">
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $rolls['id'])); ?>
		<?php endif; ?>
		
		<div id="field-name" class="control-group">	
			<div class="controls">
			<div class="form-group">
				<input type="hidden" name="hidid" value="<?php echo $member['id']; ?>">
				<?php echo form_dropdown('member_id', $dropdown_members, set_value('member_id', $rolls['member_id']),'class="form-control" id="member_name"'); ?>
			</div>
			</div>
		</div>
		
		<div id="field-name" class="control-group">	
			<div class="controls">
			<div class="form-group">
				<input type="hidden" name="hidid" value="<?php echo $screen['id']; ?>">
				<?php echo form_dropdown('screen_id', $dropdown_screens, set_value('screen_id', $rolls['screen_id']),'class="form-control" id="screen_name"'); ?>
			</div>
			</div>
		</div>
		
		<div id="field-name" class="control-group form-group row">
			<div class="controls row" style="float:none; margin: 0 auto;">
				<div class="col-md-4">
				<label><input class="form-control" type="checkbox" id="status" name="status" value="1" checked="checked" />Allowed</label>
				<?php echo form_error('status'); ?>
				</div>
			</div>
		</div>
		
	</fieldset>
<div class="form-group"></div>
	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Save</span></button>
		<?php echo anchor('admin/user_roll_assign/', 'Cancel', 'class="btn btn-primary"'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
</div>
