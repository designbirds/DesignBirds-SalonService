<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Name</th>
			<th>category</th>
			<th>description</th>
			<th>alt</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($imageupload as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/imageUpload/edit/'.$row['id'], $row['name'], 'title="Edit ImageUplaod"'); ?>
			</td>
			<td><?php echo $row['category'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['alt'] ?></td>
			<td><?php echo anchor('admin/imageUpload/delete/'.$row['id'], 'Delete', 'title="Delete Service Category"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/imageUpload/add', 'Add Image', 'title="Add Image"'); ?>