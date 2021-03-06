<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
			<td><?php echo anchor('admin/service_price/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Service Price"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>

		<?php echo anchor('admin/service_price/add', 'Add Service Price', 'class="btn btn-primary btn-sm" title="Add Service Price"'); ?>