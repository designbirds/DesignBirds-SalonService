<html>
<head>
<title>List Of tips for tipster</title>

<script type="text/javascript">

function confirm_delete(){
    var r=confirm("Are you sure?");
    if (r==true){
      alert('yes');
		location.href ='<?php echo base_url().'admin/deletetip' ?>';
    }else{
    	location.href='<?php echo base_url().'admin/deletetip' ?>';
    }
}

</script>
</head>
<body>
	<table border = "1" align = "center" width="70%">
	<tr><td colspan="4">Tipster Name : <?php foreach($TIPLIST as $row) { echo $row['name'];break; }?> </td></tr>
	<tr>
	<td width="10%">Match Id</td>
	<td width="40%">Comments</td>
	<td width="10%">Date</td>
	<td width="20%">Action</td>
	</tr>
	</table>
	<table  border = "1" align = "center" width="70%">
	<?php echo form_open('admin/tips'); ?>
	<?php foreach($TIPLIST as $row){ ?>
	
	
	<tr> 
	<td  width="10%">
	<?php echo $row['match'] ?>
	</td>
	<td width="40%">
	<?php echo $row['comment'] ?>
	</td>
	<td width="10%">
	<?php echo  date("Y-m-d", strtotime($row['date']))?>
	</td>
	<td  width="20%">
	<a href="<?php echo base_url().'admin/tipterstip/'. $row['id']; ?>">add</a>
	<a href="<?php echo base_url().'admin/edittip/'.$row['id']; ?>">edit</a>
	<a href="<?php echo base_url().'admin/confirmdelete/'. $row['tipster'].'/'. $row['id']; ?>">Delete</a>
	</td>
	</tr>
	
	<?php } ?>
	<tr>
	<td colspan="4"><?php echo form_submit('Add','Add');?><a href="<?php echo base_url().'admin/tipsters'; ?>"><input type="button" value=Back></a></td>
	</tr>
  	</table>
  	<?php echo form_close();?>

	

</body>
</html>