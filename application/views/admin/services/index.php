<table border="1">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($service as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/services/edit/'.$row['id'], $row['name'], 'title="Edit Services"'); ?>
			</td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['status'] ?></td>
			<td><?php echo anchor('admin/services/delete/'.$row['id'], 'Delete', 'title="Delete Services"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

		<?php echo anchor('admin/services/add', 'Add Service', 'title="Add Services"'); ?>