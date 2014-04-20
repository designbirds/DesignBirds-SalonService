<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>No</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Service Name</th>
			<th>Category Name</th>
			<th>employ Name</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Fixed Price</th>
			<th>Confirm Price</th>
		</tr>
	</thead>
	<tbody>
	<?php $id = 0; ?>
	<?php foreach($transaction as $row){ ?>
		<?php $id++;?>
		<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $row['customer_first_name'] ?></td>
			<td><?php echo $row['customer_last_name'] ?></td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['employ_name'] ?></td>
			<td><?php echo $row['start_time'] ?></td>
			<td><?php echo $row['end_time'] ?></td>
			<td><?php echo $row['fixed_price'] ?></td>
			<td><?php echo $row['confirm_price'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</div>
