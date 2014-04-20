<div class="main-title sec">
     
         
      </div>
      <?php foreach($feature as $row){ ?>
<div class="our-service">
        <div class="our-service-img">
        
          <img alt="" src="<?php echo base_url(). 'frontend/'; ?>img/resource/<?php echo $row['name']?>">
		 
        </div>
        <h2><i class="theme-icon big eye"></i>Hair Cut 1</h2>
        <p><?php echo $row['description']?></p>
     
      </div>
       <?php } ?>
    <!--         
      <div class="our-service">
        <div class="our-service-img">
          <img alt="" src="<?php echo $path; ?>img/resource/our-service2.jpg">
		 
        </div>
        <h2><i class="theme-icon big lab"></i>Hair Cut 2</h2>
        <p>designbirds sample description for odel salondesignbirds sample description for odel salondesignbirds sample description for odel salon</p>
      </div>
     -->