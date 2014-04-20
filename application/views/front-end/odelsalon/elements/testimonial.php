 <div class="style span6">
   <div class="clients">
    <!-- Maximum comments display -->
        <?php $turn = '0'; $max_turn='5'; ?>
        
        		<?php foreach($testimonial as $row){ ?>
					<?php if($turn < $max_turn){?>
					<!-- This prevent from showing empty data -->
        								<?php if($row['testimonial']!=''){?>
                                            <p><i class="theme-icon comma-start"></i><?php echo $row['testimonial']; ?><i class="theme-icon comma-end"></i></p>
                                            <div class="abt-client">
                                                <span>3 days Ago</span>
                                                <p><?php echo $row['customer_name']; ?></p>
                                                <i>Web Developer</i>
                                            </div>
                                            <img style="height:auto; width:auto; max-width:75px; max-height:75px;" src="<?php echo base_url(). 'frontend/'; ?>img/resource/<?php echo $row['photo']; ?>" alt="" />
                                        <br />
          									<?php }?>	
                                         <?php $turn++; } }?>  
                                         
             <div>
          
          </div>
        </div>
      </div>