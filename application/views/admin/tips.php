<html>
<head>
<title>Add Tips</title>
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open('admin/inserttips'); ?>
	<table>
	<tr>
	<td>Select a Tipster Name</td>
	<td><input type="hidden" name="hidid" value="0">
		<?php echo form_dropdown('tipster', $dropdown, set_select('tipster'), 'id="tipster"'); ?></td>
	</tr>
	<tr>
	<td>Match</td>
	<td><input type="text" name="match" value="<?php echo set_value('match'); ?>"></td>
	</tr>
	<tr>
	<td>Enter Comments</td>
	<td><?php echo form_textarea('comments','');?></td>
	</tr>
	
	<tr>
	<td>Select a date</td>
	<td><?php echo make_dates('start_');?></td>
  	</tr>
	
	<tr>
	<td><?php echo form_submit('Add','Add');?></td>
	</tr>
	
	</table>
	<?php echo form_close();?>
</body>
</html>