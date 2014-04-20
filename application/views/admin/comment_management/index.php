<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Comment</th>
			<th>Email</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($comments as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/commentMng/edit/'.$row['id'], $row['email'], 'title="Edit Comments"'); ?>
			</td>
			<td><?php echo $row['comment'] ?></td>
			<td><?php echo $row['status'] ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/commentMng/add', 'Add Comment', 'class="btn btn-primary btn-sm" title="Add Comment"'); ?>