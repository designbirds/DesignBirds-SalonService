<div class="style span6">
        <div class="clients">
        <?php if($comment_body == ''){echo anchor('/frontend/index/comment_add', 'Enter Your comment Here');} ?>
       
       <!-- Maximum comments display -->
        <?php $turn = '0'; $max_turn='5'; ?>
        
		<?php foreach($comment as $row){ ?>
					<?php if($turn < $max_turn){?>
					<!-- This prevent from showing empty data -->
        								<?php if($row['comment']!=''){?>
                                            <p><i class="theme-icon comma-start"></i><?php echo $row['comment']; ?><i class="theme-icon comma-end"></i></p>
                                          
                                            <div class="abt-client">
                                                <!-- <span>5 days Ago</span>  -->
                                                <p><?php echo $row['customer_name']; ?></p>
                                                <!-- <i>Consultant</i>  -->
                                                </div>
                                             
                                          <img style="height:auto; width:auto; max-width:75px; max-height:75px;" src="<?php echo base_url(). 'frontend/'; ?>img/resource/<?php echo $row['photo']; ?>" alt="" />
                    
                                            <br />
          									<?php }?>	
                                         <?php $turn++; } }?>  
          <div>
          <?php echo $comment_body; ?>
          </div>
         </div>
      </div>