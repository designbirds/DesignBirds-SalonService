<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Salon Odel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <?php $path = base_url(). 'frontend/'; ?>
    <link href="<?php echo $path; ?>/css/common.css" rel="stylesheet">
    <link href="<?php echo $path; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $path; ?>/css/katayam_css.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Noto+Sans:400,400italic,700,700italic|PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo $path; ?>/css/responsive.css" rel="stylesheet">
    <script src="<?php echo $path; ?>/js/modernizr.custom.46884.js"></script>
    <script type='text/javascript' src='<?php echo $path; ?>/js/jquery.min.js'></script> 
    <script type='text/javascript' src='<?php echo $path; ?>/js/bootstrap.min.js'></script>
    <script src="<?php echo $path; ?>/js/jquery.roundabout.min.js"></script>
   <script type="text/javascript" src="<?php echo $path; ?>/js/jquery.tinycarousel.min.js"></script>
   <script src="<?php echo $path; ?>/js/html5lightbox.js"></script>
    <script src="<?php echo $path; ?>/js/jquery.slicebox.js"></script>
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

        });

    </script>
    <script type="text/javascript" src="<?php echo $path; ?>/js/script.js"></script>



</head>


<body>

    <div class="theme-layout">
        <header>
            <div class="container">
                <div class="logo">
                    <a href="index.html" title=""><img src="<?php echo $path; ?>/img/resource/logo1.jpg" alt="" /></a>
                </div>

                <div id="menu">
                    <ul>
                        <li><a href="index.html" title="">HOME</a></li>
                        <li><a href="#" title="">About Us</a>
                        <li><a href="#" title="">Services</a>
                        <li><a href="#" title="">Appoinments</a>
                        <li><a href="#" title="">Blog</a>
                        <li><a href="#" title="">Contact Us</a>



                            </div>
                            <select>
                                <option onClick="window.location = 'index.html'">Index</option>
                                <option onClick="window.location = '#'">About Us</option>
                                <option onClick="window.location = '#'">Services</option>
                                <option onClick="window.location = '#'">Appoinments</option>
                                <option onClick="window.location = '#'">Blog</option>
                                <option onClick="window.location = '#'">Contact Us</option>
                            </select>
                            </div>
                            </header>


                            <div class="slider-area">
                                <div class="wrapper">
                                    <ul id="sb-slider" class="sb-slider">
                                        <li>
                                            <a href="#" title=""><img src="<?php echo $path; ?>/img/katayam_slider/slider2.jpg" alt="image1"/></a>

                                        </li>
                                        <li>
                                            <a href="#" title=""><img src="<?php echo $path; ?>/img/katayam_slider/katayam_slide1.jpg" alt="image2"/></a>

                                        </li>
                              
                                    </ul>
                                    <div id="nav-arrows" class="nav-arrows">
                                        <a href="#">Next</a>
                                        <a href="#">Previous</a>
                                    </div>
                                </div>

                            </div>

                          
                           
                             
                                <div class="toggles-style">
                                    <div class="container">
                                       
                                       
                                       
                                    </div>
                                </div>
                       

                            <section class="boxes">
                                <div class="container">
                                    <div class="boxes-left">
                                        <div class="sidebox-head">
                                            <h2>Our Services<span>Odel salon services</span></h2>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="left-side-content span8">
      <div class="main-title sec">
     
         
      </div>
					
      <div class="our-service">
        <div class="our-service-img">
          <img alt="" src="<?php echo $path; ?>img/resource/our-service1.jpg">
		 
        </div>
        <h2><i class="theme-icon big eye"></i>Hair Cut 1</h2>
        <p>designbirds sample description for odel salon designbirds sample description for odel salondesignbirds sample description for odel salon</p>
      </div>
                    
      <div class="our-service">
        <div class="our-service-img">
          <img alt="" src="<?php echo $path; ?>img/resource/our-service2.jpg">
		 
        </div>
        <h2><i class="theme-icon big lab"></i>Hair Cut 2</h2>
        <p>designbirds sample description for odel salondesignbirds sample description for odel salondesignbirds sample description for odel salon</p>
      </div>
                
   
    
      
                    
     
                
     


					
      
    </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                     
                                    </div>
                                    <div class="boxes-right">
                                          

                                      

                                     <div class="sidebox-head">
                                            <h2>Make An Appointment<span>Ready To Serve You Happily</span></h2>
                                        </div>
                                        <div class="sidebox-body">
                                            <p> Make An AppointmentMake An AppointmentMake An AppointmentMake An AppointmentMake An Appointment</p>
                                            <form class="appointment-form" action="">
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
                                            </form>
                                        </div>

                                    </div>      	
                                </div>
                            </section>

                            <section id="serve">
                                <div class="fixed-img section-bg4"></div>
                                <div class="sidebox-head">
                                    <h2 style="padding-left: 30px">What we offer at Odel Salon<span>Odel salon services</span></h2>
                                        </div>

                                <div id="slider1">
                                    <div class="container"> <span class="carousel-pagination"> <a class="buttons prev" href="#">left</a> <a class="buttons next" href="#">right</a> </span>
                                        <div class="viewport">
                                            <ul class="overview">
                                                <li>
                                                    <div class="serve-img"> 
                                                        <img src="<?php echo $path; ?>img/resource/serve1.jpg" alt="" />
                                                        <div class="serve-hover">
                                                            <p>Sample Description about odel salon services</p>
                                                            <a href="#" title="" class="link"></a>
                                                            <a href="<?php echo $path; ?>img/resource/serve1.jpg" class="html5lightbox" data-group="team"><span class="magnify"></span></a>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="figcaption"> 
                                                        <div class="serve-intro">
                                                            <h3><i class="theme-icon user"></i>Hair Cuts</h3>
                                                            <span class="speciality">unisex</span> 
                                                        </div> 
                                                        <div class="contact">
                                                            <h4>Contact us</h4>
                                                            
                                                        </div> 
                                                    </div>
                                                </li>
                                                 <li>
                                                    <div class="serve-img"> 
                                                        <img src="<?php echo $path; ?>img/resource/serve2.jpg" alt="" />
                                                        <div class="serve-hover">
                                                            <p>Sample Description about odel salon services</p>
                                                            <a href="#" title="" class="link"></a>
                                                            <a href="<?php echo $path; ?>img/resource/serve1.jpg" class="html5lightbox" data-group="team"><span class="magnify"></span></a>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="figcaption"> 
                                                        <div class="serve-intro">
                                                            <h3><i class="theme-icon user"></i>Facial</h3>
                                                            <span class="speciality">unisex</span> 
                                                        </div> 
                                                        <div class="contact">
                                                            <h4>Contact us</h4>
                                                            
                                                        </div> 
                                                    </div>
                                                </li>
                                                 <li>
                                                    <div class="serve-img"> 
                                                        <img src="<?php echo $path; ?>img/resource/serve3.jpg" alt="" />
                                                        <div class="serve-hover">
                                                            <p>Sample Description about odel salon services</p>
                                                            <a href="#" title="" class="link"></a>
                                                            <a href="<?php echo $path; ?>img/resource/serve1.jpg" class="html5lightbox" data-group="team"><span class="magnify"></span></a>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="figcaption"> 
                                                        <div class="serve-intro">
                                                            <h3><i class="theme-icon user"></i>Coloring</h3>
                                                            <span class="speciality">unisex</span> 
                                                        </div> 
                                                        <div class="contact">
                                                            <h4>Contact us</h4>
                                                            
                                                        </div> 
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="serve-img"> 
                                                        <img src="<?php echo $path; ?>img/resource/serve4.jpg" alt="" />
                                                        <div class="serve-hover">
                                                            <p>Sample Description about odel salon services</p>
                                                            <a href="#" title="" class="link"></a>
                                                            <a href="<?php echo $path; ?>img/resource/serve1.jpg" class="html5lightbox" data-group="team"><span class="magnify"></span></a>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="figcaption"> 
                                                        <div class="serve-intro">
                                                            <h3><i class="theme-icon user"></i>Padicure</h3>
                                                            <span class="speciality">unisex</span> 
                                                        </div> 
                                                        <div class="contact">
                                                            <h4>Contact us</h4>
                                                            
                                                        </div> 
                                                    </div>
                                                </li>
                                                 <li>
                                                    <div class="serve-img"> 
                                                        <img src="<?php echo $path; ?>img/resource/serve1.jpg" alt="" />
                                                        <div class="serve-hover">
                                                            <p>Sample Description about odel salon services</p>
                                                            <a href="#" title="" class="link"></a>
                                                            <a href="<?php echo $path; ?>img/resource/serve1.jpg" class="html5lightbox" data-group="team"><span class="magnify"></span></a>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="figcaption"> 
                                                        <div class="serve-intro">
                                                            <h3><i class="theme-icon user"></i>Hair Cuts</h3>
                                                            <span class="speciality">unisex</span> 
                                                        </div> 
                                                        <div class="contact">
                                                            <h4>Contact us</h4>
                                                            
                                                        </div> 
                                                    </div>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>  

                            </section>


                            <section class="boxes">
                                <div class="container">
   <div class="two-box column">
      <h1>Satisfied People With Us</h1>
      <div class="style span6">
   <div class="clients">
                                            <p><i class="theme-icon comma-start"></i>Super service Super serviceSuper serviceSuper serviceSuper serviceSuper service<i class="theme-icon comma-end"></i></p>
                                            <div class="abt-client">
                                                <span>3 days Ago</span>
                                                <p>Kasun</p>
                                                <i>Web Developer</i>
                                            </div>
                                            <img src="<?php echo $path; ?>img/resource/client1.jpg" alt="" />
                                        </div>
      </div>
      <div class="style span6">
        <div class="clients">
                                            <p><i class="theme-icon comma-start"></i>Super service Super serviceSuper serviceSuper serviceSuper serviceSuper serviceSuper service Super serviceSuper serviceSuper serviceSuper serviceSuper service<i class="theme-icon comma-end"></i></p>
                                            <div class="abt-client">
                                                <span>5 days Ago</span>
                                                <p>Dilani</p>
                                                <i>Consultant</i>
                                            </div>
                                            <img src="<?php echo $path; ?>img/resource/client1.jpg" alt="" />
                                        </div>
      </div>
    </div>

                                   
                                </div>
                            </section>

                            </div>
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
                                        <div class="flickr-images">
                                            <a href="#"><img src="<?php echo $path; ?>img/resource/flickr1.jpg" alt="" /></a>
                                            <a href="#"><img src="<?php echo $path; ?>img/resource/flickr2.jpg" alt="" /></a>
                                            <a href="#"><img src="<?php echo $path; ?>img/resource/flickr3.jpg" alt="" /></a>
                                            <a href="#"><img src="<?php echo $path; ?>img/resource/flickr4.jpg" alt="" /></a>
                                            <a href="#"><img src="<?php echo $path; ?>img/resource/flickr5.jpg" alt="" /></a>
                                            <a href="#"><img src="<?php echo $path; ?>img/resource/flickr6.jpg" alt="" /></a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </footer>

                            <div class="bottom-footer">
                             
                                    <p>@ All Rights Reserved" by <a href="http://designbirds.com.au/" title="">Design Birds</a></p>    
                                 
                             
                            </div>


                           

                            </body>

                            </html>