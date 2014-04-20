
<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">

	<thead>
		<tr>
			<th>Employ Name</th>
			<th>Service Name</th>
			<th>Category Name</th>
			<th>Start Time</th>
			<th>End Time</th>
		</tr>
	</thead>
	<tbody>
	
	<?php foreach($booking_result as $row){ ?>
		<tr>
			<td><?php echo $row['employ_name'] ?></td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['start_time'] ?></td>
			<td><?php echo $row['end_time'] ?></td>
			<td><?php echo anchor('/frontend/index/selected_data_submit/'.$row['id'], 'Book', 'class="btn btn-danger btn-xs" title="Booking Page"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>