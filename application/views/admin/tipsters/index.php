<table border="1">
	<thead>
		<tr>
			<th>Name</th>
			<th>Biline</th>
			<th>lastupdated</th>
			<th>photo_icon</th>
			<th>photo_profile</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($tipsters as $row){ ?>
		<tr>
			<td><?php echo anchor('admin/tipsters/edit/'.$row['id'], $row['name'], 'title="Edit Tipster"'); ?>
			</td>
			<td><?php echo $row['biline'] ?></td>
			<td><?php echo $row['lastupdated'] ?></td>
			<td><?php echo $row['photo_icon'] ?></td>
			<td><?php echo $row['photo_profile'] ?></td>
			<td><a href="<?php echo base_url().'admin/tips/'. $row['id']; ?>">View
					Tips</a> <?php echo anchor('admin/tipsters/delete/'.$row['id'], 'Delete', 'title="Delete Tipster"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

		<?php echo anchor('admin/tipsters/add', 'Add Tipster', 'title="Add Tipster"'); ?>