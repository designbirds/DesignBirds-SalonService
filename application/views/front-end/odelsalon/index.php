<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Salon Odel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <?php $path = base_url(). '/frontend/';?>
    <link href="<?php echo $path; ?>css/common.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/katayam_css.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Noto+Sans:400,400italic,700,700italic|PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo $path; ?>css/responsive.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/jquery.datetimepicker.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <script src="<?php echo $path; ?>js/modernizr.custom.46884.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- <script type='text/javascript' src='<?php echo $path; ?>/js/jquery.min.js'></script>  -->
    <script type='text/javascript' src='<?php echo $path; ?>js/bootstrap.min.js'></script>
    <script src="<?php echo $path; ?>js/jquery.roundabout.min.js"></script>
   <script type="text/javascript" src="<?php echo $path; ?>js/jquery.tinycarousel.min.js"></script>
   <script type="text/javascript" src="<?php echo $path; ?>js/html5lightbox.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>js/jquery.slicebox.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>js/jquery.datetimepicker.js"></script>

    <script>
        $(document).ready(function() {
           
            $(function() {
                var Page = (function() {
                    var $navArrows = $('#nav-arrows').hide(),
                            $shadow = $('#shadow').hide(),
                            slicebox = $('#sb-slider').slicebox({
                        onReady: function() {
                            $navArrows.show();
                            $shadow.show();
                        },
                        orientation: 'r',
                        cuboidsRandom: true,
                        disperseFactor: 30
                    }),
                            init = function() {
                        initEvents();
                    },
                            initEvents = function() {
                       
                        $navArrows.children(':first').on('click', function() {
                            slicebox.next();
                            return false;
                        });
                        $navArrows.children(':last').on('click', function() {
                            slicebox.previous();
                            return false;
                        });
                    };
                    return {init: init};
                })();
                Page.init();
            });

             <!-- Logo is dynamically loaded from frontend controller getLogoInfo(client_id)  -->
               	$("#logo").load("/frontend/getLogoInfo/1");


        });

    </script>
    <script type="text/javascript" src="<?php echo $path; ?>js/script.js"></script>




</head>


<body>

    <div class="theme-layout">
        <header>
            <div class="container">
                <!-- Logo is dynamically loaded from frontend controller getLogoInfo(cleint_id)  -->
                <div class="logo" id="logo"></div>
                

                <div id="menu">
                    <ul>
                        <li><a href="<?php echo '/frontend/index'; ?>" title="">HOME</a></li>
                        <li><a href="#" title="">About Us</a>
                        <li><a href="#" title="">Services</a>
                        <li><a href="<?php echo '/frontend/index/default_appointment'; ?>" title="">Appoinments</a>
                        <li><a href="#" title="">Blog</a>
                        <li><a href="#" title="">Contact Us</a>



                            </div>
                            <select>
                                <option onClick="window.location = 'index.php'">Index</option>
                                <option onClick="window.location = '#'">About Us</option>
                                <option onClick="window.location = '#'">Services</option>
                                <option onClick="window.location = '#'">Appoinments</option>
                                <option onClick="window.location = '#'">Blog</option>
                                <option onClick="window.location = '#'">Contact Us</option>
                            </select>
                            </div>
                            </header>

<?php if($index_page){?>
					<!-- Carousal goes here -->
					  <?php include "elements/carousal.php" ?>

					   <?php include "elements/section1.php" ?>	
						<!-- Featured Service Images -->
					   <?php include "elements/featuredservice.php" ?>		
                   <?php include "elements/section1_end.php" ?>	
                   
 <?php }?>
 
                          <?php if($appointment_page){?> 
                          	<?php if($register_display){?>
					  			<?php include "elements/register.php" ?>
					  				<?php }else{ ?>
					  		    		<?php if($search_result){?> 
					  						<?php include "elements/booking_search.php" ?>
					  		     		<?php } else {?>
                  		     			<!-- Booking Search body goes here -->
					  					<?php include "elements/booking.php" ?>
					  		      	<?php } ?> 
					       		<?php } ?>  
					       <?php } ?>  
					        
 <?php if($index_page){?>    
                      	
 		<?php include "elements/section2.php" ?>
                                        
      	<!-- Service Images -->
		<?php include "elements/service.php" ?>
                 
		<?php include "elements/section3.php" ?>                           
      
			<?php include "elements/testimonial.php" ?>
            <?php include "elements/comment.php" ?>
                  
        <?php include "elements/section3_end.php" ?>
        
 <?php }?>
                     
                            <footer>
                                <div class="container">
                                    <div class="widget">
                                        <h3 class="footer-title">Follow <span>Us</span></h3>
                                        <div class="follow">
                                            <ul>
                                                <li><a href="#" title=""><i class="theme-icon twitter"></i></a></li>
                                                <li><a href="#" title=""><i class="theme-icon facebook"></i></a></li>
                                                <li><a href="#" title=""><i class="theme-icon skype"></i></a></li>
                                                <li><a href="#" title=""><i class="theme-icon linkedin"></i></a></li>
                                                <li><a href="#" title=""><i class="theme-icon youtube"></i></a></li>

                                            </ul>
                                            <p> <ul>
                                                <li><i class="theme-icon email"></i><span class="source">by e-mail;</span> <span class="detail">info@odelsalon.com.au</span> </li>
                                                <li><i class="theme-icon phone"></i><span class="source">by phone;</span> <span class="detail">+900-123456</span> </li>
                                                <li><i class="theme-icon home"></i><span class="source">Address;</span> <span class="detail">22/33, xxx Street, xxxxxx, Australia> </li>
                                            </ul>
                                        </div>
                                    </div> 
                                    <div class="widget">
                                        <h3 class="footer-title">Our <span>Location</span></h3>
                                        <div class="location">
                                            <iframe height="150" src="http://maps.google.com/?ie=UTF8&amp;ll=10.487812,-22.675781&amp;spn=45.061776,86.572266&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                                           
                                        </div>
                                    </div> 
                                    <div class="widget">
                                        <h3 class="footer-title">Contact <span>Us</span></h3>
                                        <div class="contact-form">
                                            <form>
                                                <input type="text" placeholder="Name">
                                                <input type="email" placeholder="Email">
                                                <textarea rows="4" placeholder="Message"></textarea>
                                                <input type="Submit" value="Submit" class="submit">
                                            </form>
                                        </div>
                                    </div> <!-- Contact Us Form -->
                                    <div class="widget">
                                        <h3 class="footer-title">Recent <span>Photos</span></h3>
                                        
                                        <!-- Recent Photos Gallery here -->
					  					<?php include "elements/recent.php" ?>
                                        
                                    </div>
                                </div>
                            </footer>

                            <div class="bottom-footer">
                             
                                    <p>@ All Rights Reserved" by <a href="http://designbirds.com.au/" title="">Design Birds</a></p>    
                                 
                             
                            </div>

 <script type="text/javascript">
        $(document).ready(function () {
			
           	$('#service_name').change(function () {
           // alert('jquary loaded');
            var selectVal = $('#service_name :selected').val();
                console.log(selectVal);
                //alert(selectVal);
                $.ajax({
                    url: "/frontend/first_level_dropdown_call",
                    async: false,
                    type: "POST",
                    data: "service_id="+selectVal,
                    dataType: "html",

                    success: function(data) {
                        
						
						$('#category_name').html(data);
						//alert('kugdfskjf');
                        
                    }
                	

                
                })

                	if ($('#service_name').val()=='50'){
					alert('came here');
						$.ajax({
                         // It must be used as absolute path not relative because otherwise cannot use in EDIT. edit uri and add uri is DIFFERENT
                         url: "/frontend/second_level_dropdown_call_empty",
                         async: false,
                         type: "POST",
                         data: "service_id",
                         dataType: "html",

                         success: function(data) {
                             $('#category_name').html(data);
                         }
                     })
									
					}


                
            });

        	/* $('#service_name').change(function () {
                // alert('jquary loaded');
                 var selectVal = $('#service_name :selected').val();
                     //console.log(selectVal);
                     //alert(selectVal);
                     $.ajax({
                         // It must be used as absolute path not relative because otherwise cannot use in EDIT. edit uri and add uri is DIFFERENT
                         url: "/admin/second_level_dropdown_call",
                         async: false,
                         type: "POST",
                         data: "service_id="+selectVal,
                         dataType: "html",

                         success: function(data) {
                             $('#category_name').html(data);
                         }
                     })
                 });  */
            
		
        	
        });
    </script>

    <script type="text/javascript">

  $('#datetimepicker10').datetimepicker({
		step:5,
		inline:true
	});
	$('#datetimepicker_mask').datetimepicker({
		mask:'9999/19/39 29:59'
	});
	$('#datetimepicker_mask1').datetimepicker({
		mask:'9999/19/39 29:59'
	});
	$('#datetimepicker').datetimepicker();
	$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});
	$('#datetimepicker1').datetimepicker({
		datepicker:false,
		format:'H:i',
		step:5
	});
	$('#datetimepicker2').datetimepicker({
		yearOffset:222,
		lang:'ch',
		timepicker:false,
		format:'d/m/Y',
		formatDate:'Y/m/d',
		minDate:'-1970/01/02', // yesterday is minimum date
		maxDate:'+1970/01/02' // and tommorow is maximum date calendar
	});
	$('#datetimepicker3').datetimepicker({
		inline:true
	});
	$('#datetimepicker4').datetimepicker();
	$('#open').click(function(){
		$('#datetimepicker4').datetimepicker('show');
	});
	$('#close').click(function(){
		$('#datetimepicker4').datetimepicker('hide');
	});
	$('#reset').click(function(){
		$('#datetimepicker4').datetimepicker('reset');
	});
	$('#datetimepicker5').datetimepicker({
		datepicker:false,
		allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00']
	});
	$('#datetimepicker6').datetimepicker();
	$('#destroy').click(function(){
		if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
			$('#datetimepicker6').datetimepicker('destroy');
			this.value = 'create';
		}else{
			$('#datetimepicker6').datetimepicker();
			this.value = 'destroy';
		}
	});
	var logic = function( currentDateTime ){
		if( currentDateTime.getDay()==6 ){
			this.setOptions({
				minTime:'11:00'
			});
		}else
			this.setOptions({
				minTime:'8:00'
			});
	};
	$('#datetimepicker7').datetimepicker({
		onChangeDateTime:logic,
		onShow:logic
	});
	$('#datetimepicker8').datetimepicker({
		onGenerate:function( ct ){
			$(this).find('.xdsoft_date')
				.toggleClass('xdsoft_disabled');
		},
		minDate:'-1970/01/2',
		maxDate:'+1970/01/2',
		timepicker:false
	});
	$('#datetimepicker9').datetimepicker({
		onGenerate:function( ct ){
			$(this).find('.xdsoft_date.xdsoft_weekend')
				.addClass('xdsoft_disabled');
		},
		weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
		timepicker:false
	});
	
</script>
                           

                            </body>

                            </html>