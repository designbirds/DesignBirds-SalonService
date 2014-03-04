<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Name</th>
			<th>Feature</th>
			<th>Service</th>
			<th>Category</th>
			<th>Description</th>
			<th>Alt</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($imageupload as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/imageUpload/edit/'.$row['id'], $row['name'], 'title="Edit ImageUplaod"'); ?>
			</td>
			<td><?php echo $row['feature_name'] ?></td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['alt'] ?></td>
			<td><?php echo anchor('admin/imageUpload/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Service Category"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/imageUpload/add', 'Add Image', 'class="btn btn-primary btn-sm" title="Add Image"'); ?>