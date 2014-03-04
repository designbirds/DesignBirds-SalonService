<!DOCTYPE html> 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ODEL SALON SERVICES REGISTER FORM</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

</head>
<body>

<div class="container">
 	<?php echo form_open_multipart($form['redirect']); ?>
         <!--  <form role="form"> -->
             <?php if ($this->session->flashdata('message')) : ?>
    			<p><?php echo $this->session->flashdata('message'); ?></p>
   				<?php endif; ?>
<legend>Sign Up</legend>
<div class="well">
<fieldset class="form-fields">
		<legend>Sign Up</legend>
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $register['id'])); ?>
			<?php endif; ?>
			
		<div class="control-group">
	        <label class="control-label">First Name</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="icon-user"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="fname" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name', $register['first_name']); ?>">
				</div>
			</div>
		</div>
		<div class="control-group ">
	        <label class="control-label">Last Name</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="icon-user"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="lname" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name', $register['last_name']); ?>">
				</div>
			</div>
		</div>
		
		<div class="control-group">
	        <label class="control-label">Email</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email', $register['email']); ?>">
				</div>
			</div>
		</div>
		
		<div class="control-group">
	        <label class="control-label">Telephone</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="telephone" name="telephone" placeholder="Telephone Number" value="<?php echo set_value('telephone', $register['telephone']); ?>">
				</div>
			</div>
		</div>
		
		<div class="control-group ">
	        <label class="control-label">Username</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="user_name" name="user_name" placeholder="User Name" value="<?php echo set_value('user_name', $register['user_name']); ?>">
				</div>
			</div>
		</div>
		
		<div class="control-group">
	        <label class="control-label">Password</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					<input type="Password" id="passwd" class="input-xlarge form-control input_size" name="password" placeholder="Password">
				</div>
			</div>
		</div>
		<div class="control-group">
	        <label class="control-label">Confirm Password</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					<input type="Password" id="password2" class="input-xlarge form-control input_size" name="password2" placeholder="Re-enter Password">
				</div>
			</div>
		</div>
</fieldset>
		<div class="control-group form-group"></div>

               <!--  </form> -->
                        	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-success"><span>Create My Account</span></button>
		<?php echo anchor('user/index', 'Cancel', 'class="btn btn-success"'); ?>
	</fieldset>
        </div>                
		<?php echo form_close(); ?>
                        
                       
</div>
</body>
</html>