               <div class="container">
               <div class="boxes-right">
                                   
<!-- 
                                     <div class="sidebox-head">
                                            <h2>Make An Appointment<span>Ready To Serve You Happily</span></h2>
                                        </div>
                                        <div class="sidebox-body">
                                            <p> Make An AppointmentMake An AppointmentMake An AppointmentMake An AppointmentMake An Appointment</p>
                                            <form class="appointment-form" action="">
                                      -->   
                                      <div class="sidebox-head">
                                      	<h2>Make An Appointment<span>Ready To Serve You Happily</span></h2>
                                      </div>
                                       <div class="sidebox-body">   
                                       	<p> Make An AppointmentMake An AppointmentMake An AppointmentMake An AppointmentMake An Appointment</p>
                                            
									<?php echo form_open_multipart($booking['form']['redirect']); ?>

							<?php if ($this->session->flashdata('message')) : ?>
							    	<p><?php echo $this->session->flashdata('message'); ?></p>
							    <?php endif; ?>
							
							<fieldset class="form-fields">
								
								<?php if ($booking['form']['mode'] == 'update') : ?>
							<?php echo form_hidden('id', set_value('id', $booking['booking_search_body']['id'])); ?>
							<?php endif; ?>
                                               <!-- 
                                                <input type="text" placeholder="Name Of Customer" class="full">
                                                <span class="half-fields">
                                                    <input type="text" placeholder="Phone No" class="half">
                                                    <input type="text" placeholder="staff Name" class="half">
                                                </span>
                                                <input type="email" placeholder="Email" class="full">
                                                <span class="half-fields">
                                                    <input type="text" placeholder="Date" class="half">
                                                    <input type="text" placeholder="Time" class="half">
                                                </span>
                                                <input type="text" placeholder="Additional Info" class="full">
                                                <input type="submit" value="Submit" class="submit">
                                                 -->
                                                 <div id="field-name" class="control-group">	
													<div class="controls">
													<div class="form-group">
														<input type="hidden" name="hidid" value="<?php echo $booking['service']['id']; ?>">
<?php echo form_dropdown('service_id', $booking['dropdown_service'], set_value('name', $booking['service']['name']),'class="form-control" id="service_name"'); ?>
	</div>
	</div>
</div>
<!-- For replaced and displayed -->
		<div class="form-group" id="category_name"><select class="form-control"><option value=''>Select a category</option></select></div>	
		
<div id="field-name" class="control-group form-group">
	<div class="controls">
		<?php form_label('Start Time', 'start_time'); ?>
<input class="form-control" type="text" id="datetimepicker_mask" name="start_time" placeholder="Start Time" value="<?php echo $booking['booking_search_body']['start_time']; ?>" />
<?php echo form_error('start_time'); ?>
	</div>
</div>

<div id="field-name" class="control-group form-group">
	<div class="controls">
		<?php form_label('End Time', 'end_time'); ?>
<input class="form-control" type="text" id="datetimepicker_mask1" name="end_time" placeholder="End Time" value="<?php echo $booking['booking_search_body']['end_time']; ?>" />
<?php echo form_error('end_time'); ?>
											</div>
										</div>
		
											<button type="submit" name="submit" value="upload" class="send btn btn-default"><span>Search</span></button>
													
											</fieldset>
												
                                            <?php echo form_close(); ?>
                                        </div>

                                    </div> 
                                    </div>