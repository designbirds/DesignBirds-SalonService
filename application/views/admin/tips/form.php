<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

<?php if ($this->session->flashdata('message')) : ?>
	<p>
	<?php echo $this->session->flashdata('message'); ?>
	</p>
	<?php endif; ?>

	<fieldset class="form-fields">

	<?php if ($form['mode'] == 'update') : ?>
	<?php echo form_hidden('id', set_value('id', $tips['id'])); ?>
	<?php endif; ?>

		<div id="field-name" class="control-group">
			<div class="controls">
			<?php form_label('Name', 'tipster-name'); ?>
			<?php echo form_dropdown('tipster', $dropdown, $tips['tipster']); ?>
			<?php echo form_error('name'); ?>
			</div>
		</div>

		<div id="field-match" class="control-group">
			<div class="controls">
			<?php form_label('match', 'tips-match'); ?>
				<input type="text" id="tips-match" name="match" placeholder="match"
					value="<?php echo set_value('match', $tips['match']); ?>" />
					<?php echo form_error('match'); ?>
			</div>
		</div>

		<div id="field-comments" class="control-group">
			<div class="controls">
			<?php form_label('comment', 'tips-comment'); ?>
				<textarea id="tips-comments" name="comment"	placeholder="Enter Tips comments here."><?php echo set_value('comment', trim($tips['comment'])); ?>
				</textarea>
				<?php echo form_error('comment'); ?>
			</div>
		</div>


		<div id="field-name" class="control-group">
			<div class="controls">
			<?php form_label('date', 'tips-date'); ?>

			<?php
				
			if ($form['mode'] == 'update')
			{
				$date = date("Y-m-d", strtotime($tips['date']));
			}
			else
			{
				$date = date("Y-m-d");
			}
			list($y, $m, $d) = explode('-', $date);
			?>
				<select name="start_day"><?php echo DayDropdown($d);?>
				</select> <select name="start_month"><?php echo MonthDropdown($m); ?>
				</select> <select name="start_year"><?php echo YearDropdown($y); ?>
				</select><br>
				<?php echo form_error('date'); ?>
			</div>
		</div>

		<fieldset class="form-actions">
			<button type="submit" name="submit" value="Add"
				class="send btn btn-primary">
				<span>Submit</span>
			</button>
			<?php echo anchor('admin/tips/'.$tips['tipster'], 'Cancel'); ?>
		</fieldset>


		<?php echo form_close(); ?>

</div>
