<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Employ Name</th>
			<th>Feature</th>
			<th>Service</th>
			<th>Category</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Confirmed</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($time_allocation as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/user_time_allocation/edit/'.$row['id'], $row['employ_name'], 'title="Edit Time Allocation"'); ?>
			</td>
			<td><?php echo $row['feature_name'] ?></td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['start_time'] ?></td>
			<td><?php echo $row['end_time'] ?></td>
			<td><?php echo $row['status'] ?></td>
			<td><?php echo anchor('admin/user_time_allocation/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Time Allocation"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/user_time_allocation/add', 'Add Time Allocation', 'class="btn btn-primary btn-sm" title="Add Time Allocation"'); ?>