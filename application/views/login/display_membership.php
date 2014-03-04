<!DOCTYPE html> 
<head>
  <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Username</th>
			<th>Password</th>
			<th>Telephone</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($membership as $row){ ?>
		<tr>
			<td><?php echo anchor('user/index/edit/'.$row['id'], $row['first_name'], 'title="Edit Membership"'); ?>
			</td>
			<td><?php echo $row['last_name'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['user_name'] ?></td>
			<td><?php echo $row['password'] ?></td>
			<td><?php echo $row['telephone'] ?></td>
			<td><?php echo anchor('user/index/delete/'.$row['id'], 'Delete', 'class="btn btn-danger btn-xs" title="Delete Membership"'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
		<?php echo anchor('user/index/register', 'Create Membership', 'class="btn btn-primary btn-sm" title="Create Membership"'); ?>
</div>
</body>
</html>