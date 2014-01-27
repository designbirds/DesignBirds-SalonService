<html>
<head>
<title></title>
</head>
<body>

	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart('admin/add_tipters'); ?>
	<table>
	<tr>
	<td><input type="hidden" name="hidid" value="0">
	</tr>
	<tr>
	<td>Enter Name</td>
	<td><input type="text" name="name" value="<?php echo set_value('name'); ?>"></td>
	</tr>
	<tr>
	<td>Enter biline</td>
	<td><input type="text" name="biline" value="<?php echo set_value('biline'); ?>"></td>
	</tr>
	<tr>
	<td>Enter biography</td>
	<td><input type="text" name="biography" value="<?php echo set_value('biography'); ?>"></td>
	</tr>
		<tr>
	<td>Enter photo</td>
	<td><input type="file" name="userfile" size="20" />
	<?php echo form_submit('upload','upload');?></td>
	</tr>
	</table>
	<?php echo form_close();?>
</body>
</html>