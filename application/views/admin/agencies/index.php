<table border="1">
	<thead>
		<p>
		<?php echo $links; ?>
		</p>
		<tr>
			<th>Name</th>
			<th>lastupdated</th>
			<th>photo_icon</th>
			<th>photo_profile</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($agencies as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/agencies/edit/'.$row['id'], $row['name'], 'title="Edit Agency"'); ?>
			</td>
			<td><?php echo $row['lastupdated'] ?></td>
			<td><?php echo $row['photo_icon'] ?></td>
			<td><?php echo $row['photo_profile'] ?></td>
			<td><?php echo anchor('admin/agencies/delete/'.$row['id'], 'Delete', 'title="Delete Agency"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

		<?php echo anchor('admin/agencies/add', 'Add Agency', 'title="Add Agency"'); ?>