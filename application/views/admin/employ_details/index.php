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
		</tr>
	</thead>
	<tbody>
	<?php foreach($employ as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/employee_details/edit/'.$row['id'], $row['first_name'], 'title="Edit Employee Details"'); ?>
			</td>
			<td><?php echo $row['last_name'] ?></td>
			<td><?php echo $row['address'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['telephone'] ?></td>
			<td><?php echo anchor('admin/employee_details/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Employee"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/employee_details/add', 'Add Employee', 'class="btn btn-primary btn-sm" title="Add Employee"'); ?>