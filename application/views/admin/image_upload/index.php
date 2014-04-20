<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Name</th>
			<th>Service</th>
			<th>Category</th>
			<th>Description</th>
			<th>Alt</th>
			<th>Priority</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $path = base_url(). 'frontend/img/resource/'; ?>
		<?php $priority = base_url(). 'frontend/img/'; ?>
		<?php $href = "<a href=\""; ?>
		<?php $href2 = "\">"; ?>
		<?php $img_path1 = "<img style=\"height:auto; width:auto; max-width:150px; max-height:150px;\" src=\""; ?>
		<?php $img_priority_path = "<img src=\""; ?>
		<?php $img_path2 = "\"";?>
		
	<?php foreach($imageupload as $row){ ?>
		<tr>
			<!-- <td><?php //echo anchor('admin/imageUpload/edit/'.$row['id'], $row['name'], 'title="Edit Service Image"'); ?>
			</td> -->
			<td><?php echo $href.'/admin/imageUpload/edit/'.$row['id'].$href2.$img_path1.$path.$row['name'].$img_path2; ?></td>
			<td><?php echo $row['service_name'] ?></td>
			<td><?php echo $row['category_name'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['alt'] ?></td>
			<td><?php if($row['priority']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php echo anchor('admin/imageUpload/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Service Image"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/imageUpload/add', 'Add Image', 'class="btn btn-primary btn-sm" title="Add Image"'); ?>