<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Name</th>
			<th>Service</th>
			<th>Category</th>
			<th>Description</th>
			<th>Alt</th>
		</tr>
	</thead>
	<tbody>
		<?php $path = base_url(). 'frontend/img/resource/'; ?>
		<?php $href = "<a href=\""; ?>
		<?php $href2 = "\">"; ?>
		<?php $img_path1 = "<img src=\""; ?>
		<?php $img_path2 = "\"";?>
		
	<?php foreach($imageupload as $row){ ?>
		<tr>
		<!-- <td><?php //echo anchor('admin/recent_imageUpload/edit/'.$row['id'], $row['name'], 'title="Edit Service Image"'); ?>
			</td> -->
			<td><?php echo $href.'/admin/recent_imageUpload/edit/'.$row['id'].$href2.$img_path1.$path.$row['name'].$img_path2; ?></td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['alt'] ?></td>
			<td><?php echo anchor('admin/recent_imageUpload/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Service Image"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/recent_imageUpload/add', 'Add Image', 'class="btn btn-primary btn-sm" title="Add Image"'); ?>