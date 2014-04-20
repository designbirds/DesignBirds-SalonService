<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Service Name</th>
			<th>Category Name</th>
			<th>employ Name</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Fixed Price</th>
			<th>Confirm Price</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		
	<?php $priority = base_url(). 'frontend/img/'; ?>
	<?php $img_priority_path = "<img src=\""; ?>
	<?php $img_path2 = "\"";?>
		
	<?php foreach($transaction as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/booking_transaction/edit/'.$row['id'], $row['customer_first_name'], 'title="Edit Transaction"'); ?>
			</td>
			<td><?php echo $row['customer_last_name'] ?></td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['employ_name'] ?></td>
			<td><?php echo $row['start_time'] ?></td>
			<td><?php echo $row['end_time'] ?></td>
			<td><?php echo $row['fixed_price'] ?></td>
			<td><?php echo $row['confirm_price'] ?></td>
			<td><?php if($row['status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php echo anchor('admin/booking_transaction/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Transaction"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
