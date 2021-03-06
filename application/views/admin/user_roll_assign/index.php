<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Username</th>
			<th>Screen Name</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php $priority = base_url(). 'frontend/img/'; ?>
	<?php $img_priority_path = "<img src=\""; ?>
	<?php $img_path2 = "\"";?>
		
	<?php foreach($rolls as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/user_roll_assign/edit/'.$row['id'], $row['user_name'], 'title="Edit The Roll Assign"'); ?>
			</td>
			<td><?php echo $row['screen_name'] ?></td>
			<td><?php if($row['status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php echo anchor('admin/user_roll_assign/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete the Roll"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/user_roll_assign/add', 'Add The Roll', 'class="btn btn-primary btn-sm" title="Add The Roll"'); ?>