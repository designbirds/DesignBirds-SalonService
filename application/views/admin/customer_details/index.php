<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone No</th>
			<th>Mobile No</th>
			<th>Imageupload Status</th>
			<th>Event Status</th>
			<th>Comment Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($customers as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/customer_details/edit/'.$row['id'], $row['name'], 'title="Edit Customer Details"'); ?>
			</td>
			<td><?php echo $row['address'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['phone_no'] ?></td>
			<td><?php echo $row['mobile_no'] ?></td>
			<td><?php echo $row['imageupload_status'] ?></td>
			<td><?php echo $row['event_status'] ?></td>
			<td><?php echo $row['comment_status'] ?></td>
			<td><?php echo anchor('admin/customer_details/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Customer"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/customer_details/add', 'Add Customer', 'class="btn btn-primary btn-sm" title="Add Customers"'); ?>