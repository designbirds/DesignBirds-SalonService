<!DOCTYPE html> 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ODEL SALON SERVICES RESETTING PASSWORD</title>

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
<legend>Reset Password</legend>
<div class="well">
<fieldset class="form-fields">
		<legend>Enter Your Email or Telephone Number</legend>
		<?php if ($form['mode'] == 'update') : ?>

			<?php endif; ?>
		
		<div class="control-group">
	        <label class="control-label">Username</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="user_name" name="user_name" placeholder="Enter Your Username" >
				</div>
			</div>
		</div>
			
		<div class="control-group">
	        <label class="control-label">Email</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="email" name="email" placeholder="Enter Your Email Address" >
				</div>
			</div>
		</div>
		<div><p>OR</p></div>
		<div class="control-group">
	        <label class="control-label">Telephone</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="telephone" name="telephone" placeholder="Enter Your Telephone Number">
				</div>
			</div>
		</div>
		
</fieldset>
		<div class="control-group form-group"></div>

               <!--  </form> -->
                        	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-success"><span>Send</span></button>
		<?php echo anchor('user/index', 'Cancel', 'class="btn btn-success"'); ?>
	</fieldset>
        </div>                
		<?php echo form_close(); ?>
                        
                       
</div>
</body>
</html>