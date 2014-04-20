<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Name</th>
			<th>Service</th>
			<th>Category</th>
			<th>Description</th>
			<th>Offer Price</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Phone</th>
			<th>Email</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $priority = base_url(). 'frontend/img/'; ?>
		<?php $img_priority_path = "<img src=\""; ?>
		<?php $img_path2 = "\"";?>
		
	<?php foreach($events as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/event_management/edit/'.$row['id'], $row['name'], 'title="Edit An Event"'); ?>
			</td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['offer_price'] ?></td>
			<td><?php echo $row['start_time'] ?></td>
			<td><?php echo $row['end_time'] ?></td>
			<td><?php if($row['phone_status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php if($row['email_status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php echo anchor('admin/event_management/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete The Event"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/event_management/add', 'Add An Event', 'class="btn btn-primary btn-sm" title="Add An Event"'); ?>