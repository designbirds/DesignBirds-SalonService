<table border="1">
	<thead>
		<tr>
			<th>Name</th>
			<th>category</th>
			<th>description</th>
			<th>alt</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($imageupload as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/imageUpload/edit/'.$row['id'], $row['name'], 'title="Edit ImageUplaod"'); ?>
			</td>
			<td><?php echo $row['category_id'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['alt'] ?></td>

		</tr>
		<?php } ?>
	</tbody>
</table>

		<?php echo anchor('admin/imageUpload/add', 'Add Image', 'title="Add Image"'); ?>