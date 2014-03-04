<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Name</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($feature as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/features/edit/'.$row['id'], $row['name'], 'title="Edit Features"'); ?>
			</td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo anchor('admin/features/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Features"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/features/add', 'Add Feature', 'class="btn btn-primary btn-sm" title="Add Features"'); ?>