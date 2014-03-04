<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ODEL SALON SERVICES ADMIN LOGIN</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    
                    <div class="form-group">
					<div id="container">
                    <?php echo form_open_multipart('user/index/login'); ?>
                        <!--  <form role="form"> -->
                        <?php if ($this->session->flashdata('message')) : ?>
    					<p><?php echo $this->session->flashdata('message'); ?></p>
   						 <?php endif; ?>
                            <fieldset class="form-fields">
                                <div class="input-prepend input-group input_size form-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                    <input class="form-control" placeholder="User Name" name="user_name" type="text" autofocus>
                                </div>
                                <div class="input-prepend input-group input_size form-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                   <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <label>
                                    	<?php echo anchor('user/index/forget', 'Forget Password'); ?>
                                    </label>
                                </div>
                                
                            </fieldset>
                        <!--  </form> -->
                        	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-success"><span>Login</span></button>
		<?php echo anchor('user/index/register', 'Register', 'class="btn btn-success"'); ?>
	</fieldset>
                        <?php echo form_close(); ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
