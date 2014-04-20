<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Logo Name</th>
			<th>User</th>
			
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
			<td><?php echo $href.'/admin/logo_design/edit/'.$row['id'].$href2.$img_path1.$path.$row['name'].$img_path2; ?>
			</td>
			<td><?php echo $row['member_name'] ?></td>
			<td><?php echo anchor('admin/logo_design/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Logo"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/logo_design/add', 'Add Logo', 'class="btn btn-primary btn-sm" title="Add Logo"'); ?>