<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Photo</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone No</th>
			<th>Mobile No</th>
			<th>Imageupload Status</th>
			<th>Event Status</th>
			<th>Comment Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $path = base_url(). 'frontend/img/resource/'; ?>
		<?php $href = "<a href=\""; ?>
		<?php $href2 = "\">"; ?>
		<?php $img_path1 = "<img style=\"height:auto; width:auto; max-width:100px; max-height:100px;\" src=\""; ?>
		<?php $img_path2 = "\"";?>
		<?php $priority = base_url(). 'frontend/img/'; ?>
		<?php $img_priority_path = "<img src=\""; ?>
		
		
	<?php foreach($customers as $row){ ?>
		<tr>
	
			<td><?php echo $href.'/admin/customer_details/edit/'.$row['id'].$href2.$img_path1.$path.$row['image_name'].$img_path2; ?></td>
			<td><?php echo anchor('admin/customer_details/edit/'.$row['id'], $row['first_name'], 'title="Edit Customer Details"'); ?>
			</td>
			<td><?php echo $row['last_name'] ?></td>
			<td><?php echo $row['address'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['phone_no'] ?></td>
			<td><?php echo $row['mobile_no'] ?></td>
			<td><?php if($row['imageupload_status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php if($row['event_status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php if($row['comment_status']){echo $img_priority_path.$priority."correct.png".$img_path2;}else{ echo $img_priority_path.$priority."wrong.png".$img_path2; } ?></td>
			<td><?php echo anchor('admin/customer_details/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Customer"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('admin/customer_details/add', 'Add Customer', 'class="btn btn-primary btn-sm" title="Add Customers"'); ?>