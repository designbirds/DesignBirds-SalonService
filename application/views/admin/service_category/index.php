<table border="1">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Service</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($service_category as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/service_category/edit/'.$row['id'], $row['name'], 'title="Edit Service Category"'); ?>
			</td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['service_id'] ?></td>
			<td><?php echo anchor('admin/service_category/delete/'.$row['id'], 'Delete', 'title="Delete Service Category"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

		<?php echo anchor('admin/service_category/add', 'Add Service Category', 'title="Add Service Category"'); ?>