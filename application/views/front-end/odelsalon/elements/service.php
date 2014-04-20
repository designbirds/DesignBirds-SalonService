                <div id="slider1">
                                    <div class="container"> <span class="carousel-pagination"> <a class="buttons prev" href="#">left</a> <a class="buttons next" href="#">right</a> </span>
                                        <div class="viewport">
                                            <ul class="overview">
                                             <?php foreach($service as $row){ ?>
                                                <li>
                                                    <div class="serve-img"> 
                                                        <img src="<?php echo base_url(). 'frontend/'; ?>img/resource/<?php echo $row['name']?>" alt="" />
                                                        <div class="serve-hover">
                                                            <p><?php echo $row['description']; ?></p>
                                                            <p>geg34234</p>
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
                                              <?php } ?>
                                              
                                              <!-- 
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
                                                -->
                                            </ul>
                                        </div>
                                    </div>
                                </div> 