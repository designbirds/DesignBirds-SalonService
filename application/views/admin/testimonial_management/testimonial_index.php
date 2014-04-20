<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Testimonial</th>
			<th>Email</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $priority = base_url(). 'frontend/img/'; ?>
		<?php $img_priority_path = "<img src=\""; ?>
		<?php $img_path2 = "\"";?>
		
	<?php foreach($testimonial as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/testimonialMng/edit/'.$row['id'], $row['email'], 'title="Edit Testimonial"'); ?>
			</td>
			<td><?php echo $row['testimonial'] ?></td>
			<td><?php if($row['status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php echo anchor('admin/testimonialMng/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Testimonial"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/testimonialMng/add', 'Add Testimonial', 'class="btn btn-primary btn-sm" title="Add Testimonial"'); ?>