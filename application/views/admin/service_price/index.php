<table border="1">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Service Name</th>
			<th>Category Name</th>
			<th>Price</th>
			<th>Discount</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($service_price as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/service_price/edit/'.$row['id'], $row['service_name'], 'title="Edit Service Price"'); ?>
			</td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['price'] ?></td>
			<td><?php echo $row['discount'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo anchor('admin/service_price/delete/'.$row['id'], 'Delete', 'title="Delete Service Price"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

		<?php echo anchor('admin/service_price/add', 'Add Service Price', 'title="Add Service Price"'); ?>