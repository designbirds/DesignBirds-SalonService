

<div class="container">

<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<p>
		
		</p>
		<tr>
			<th>Service Name</th>
			<th>Category Name</th>
			<th>Employ Name</th>
			<th>Start Time</th>
			<th>End Time</th>
		</tr>
	</thead>
<tbody>
<tr>
			<td><?php echo $selected_booking['fetch_selected_data']['service_name']; ?></td>
			<td><?php echo $selected_booking['fetch_selected_data']['category_name']; ?></td>
			<td><?php echo $selected_booking['fetch_selected_data']['employ_name']; ?></td>
			<td><?php echo $selected_booking['fetch_selected_data']['start_time']; ?></td>
			<td><?php echo $selected_booking['fetch_selected_data']['end_time']; ?></td>
			
</tr>
<tr>
			<td><?php echo '<h3>'.'This service price is Only: '.'<strong>'.$selected_booking['fetch_service_price']['price'].'.00'.'</strong>'.'</h3>'; ?></td>
			
</tr>
</tbody>
</table>
</div>

 	<?php echo form_open_multipart($register['form']['redirect']); ?>
         <!--  <form role="form"> -->
             <?php if ($this->session->flashdata('message')) : ?>
    			<p><?php echo $this->session->flashdata('message'); ?></p>
   				<?php endif; ?>
<legend>Confirm Booking</legend>
<div class="well">
<fieldset class="form-fields">
		<legend>Confirm Booking</legend>
		<?php if ($register['form']['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $register['register']['id'])); ?>
			<?php endif; ?>
			
		<div class="control-group">
	        <label class="control-label">First Name</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="icon-user"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="fname" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name', $register['register']['first_name']); ?>">
				</div>
			</div>
		</div>
		<div class="control-group ">
	        <label class="control-label">Last Name</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="icon-user"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="lname" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name', $register['register']['last_name']); ?>">
				</div>
			</div>
		</div>
		<div class="control-group ">
	        <label class="control-label">Address</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="icon-user"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="address" name="address" placeholder="Address" value="<?php echo set_value('address', $register['register']['address']); ?>">
				</div>
			</div>
		</div>
		
		<div class="control-group">
	        <label class="control-label">Email</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email', $register['register']['email']); ?>">
				</div>
			</div>
		</div>
		
		<div class="control-group">
	        <label class="control-label">Telephone</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="phone_no" name="phone_no" placeholder="Telephone Number" value="<?php echo set_value('phone_no', $register['register']['phone_no']); ?>">
				</div>
			</div>
		</div>
		
			<div class="control-group">
	        <label class="control-label">Mobile</label>
			<div class="controls">
			    <div class="input-prepend input-group input_size form-group">
				<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					<input type="text" class="input-xlarge form-control input_size" id="mobile_no" name="mobile_no" placeholder="Mobile Number" value="<?php echo set_value('mobile_no', $register['register']['mobile_no']); ?>">
				</div>
			</div>
		</div>
		
					<div id="field-name" class="control-group form-group row">
			<div class="controls row" style="float:none; margin: 0 auto;">
				<div class="col-md-4">
				<label><input class="form-control" type="checkbox" id="status" name="status" value="1" checked="checked" />I would like to register with you</label>
				<?php echo form_error('status'); ?>
				</div>
			</div>
		</div>
		
		
</fieldset>
		<div class="control-group form-group"></div>

               <!--  </form> -->
                        	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-success"><span>Confirm Booking</span></button>
		<?php echo anchor('/', 'Cancel', 'class="btn btn-success"'); ?>
	</fieldset>
        </div>                
		<?php echo form_close(); ?>
                        
                       
</div>
