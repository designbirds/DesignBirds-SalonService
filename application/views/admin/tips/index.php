<table border="1" align="left">
	<thead>
		<!-- tr>
		<td colspan="4">Tipster Name : <?php foreach($TIPLIST as $row) { echo $row['name'];break; }?>
		</td>
	</tr> -->
		<tr>
			<th>Match Id</th>
			<th>Comments</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody border="1" align="left">
	<?php foreach($tips as $row){ ?>


		<tr>
			<td><?php echo $row['match'] ?></td>
			<td><?php echo $row['comment'] ?></td>
			<td><?php echo  date("Y-m-d", strtotime($row['date']))?>
			</td>
			<td alin="left">
				<a href="<?php echo base_url().'admin/tips/edit/'.$row['id']; ?>">edit</a>
				<!-- a href="<?php echo base_url().'admin/tips/delete/'. $row['tipster'].'/'. $row['id']; ?>">Delete</a> -->
				<a href="<?php echo base_url().'admin/tips/delete/'. $row['id']; ?>">Delete</a>
			</td>
		</tr>

		<?php } ?>
		<tr>
			<td colspan="4" align="left">
					<?php echo anchor('admin/tips/add', 'Add Tips', 'title="Add Tips"'); ?>
					<?php echo anchor('admin/tipsters', 'Go Back', 'title="Go Back to tipsters"'); ?>
			</td>
		</tr>
	</tbody>
</table>
