<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Name</th>
			<th>Service</th>
			<th>Category</th>
			<th>Small Content</th>
			<th>Large Content</th>
			<th>Image Content</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $priority = base_url(). 'frontend/img/'; ?>
		<?php $img_priority_path = "<img src=\""; ?>
		<?php $img_path2 = "\"";?>
				
	<?php foreach($contents as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/content_management/edit/'.$row['id'], 'Edit', 'title="Edit The Content"'); ?>
			</td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['small_content'] ?></td>
			<td><?php echo $row['large_content'] ?></td>
			<td><?php echo $row['image_content'] ?></td>
			<td><?php if($row['status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php echo anchor('admin/content_management/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete the Content"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/content_management/add', 'Add The Content', 'class="btn btn-primary btn-sm" title="Add The Content"'); ?>