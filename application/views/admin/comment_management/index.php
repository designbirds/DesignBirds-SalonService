<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Type</th>
			<th>Comment</th>
			<th>Service</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($comments as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/commentMng/edit/'.$row['id'], $row['type'], 'title="Edit Comments"'); ?>
			</td>
			<td><?php echo $row['comment'] ?></td>
			<td><?php echo $row['category_id'] ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/commentMng/add', 'Add Comment', 'class="btn btn-primary btn-sm" title="Add Comment"'); ?>