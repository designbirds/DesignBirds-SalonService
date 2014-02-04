<table border="1">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Name</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($feature as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/features/edit/'.$row['id'], $row['name'], 'title="Edit Features"'); ?>
			</td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo anchor('admin/features/delete/'.$row['id'], 'Delete', 'title="Delete Features"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

		<?php echo anchor('admin/features/add', 'Add Feature', 'title="Add Features"'); ?>