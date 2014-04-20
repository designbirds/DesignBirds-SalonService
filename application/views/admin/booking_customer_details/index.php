<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone No</th>
			<th>Mobile No</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($customers as $row){ ?>
		<tr>
	
			<td><?php echo anchor('admin/booking_customer_details/edit/'.$row['id'], $row['first_name'], 'title="Edit Booking Customer Details"'); ?>
			</td>
			<td><?php echo $row['last_name'] ?></td>
			<td><?php echo $row['address'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['phone_no'] ?></td>
			<td><?php echo $row['mobile_no'] ?></td>
			<td><?php echo anchor('admin/booking_customer_details/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Booking Customer"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>