<div class="slider-area">
                                <div class="wrapper">
                                    <ul id="sb-slider" class="sb-slider">
                                    <?php foreach($carousal as $row){ ?>
                                     
   <li>
                                            <a href="#" title=""><img src="<?php echo base_url(). 'frontend/'; ?>img/resource/<?php echo $row['name']?>" alt="image1"/></a>

                                        </li>
            
                                        <?php } ?>
                              
                                    </ul>
                                    <div id="nav-arrows" class="nav-arrows">
                                        <a href="#">Next</a>
                                        <a href="#">Previous</a>
                                    </div>
                                </div>

                            </div>
                            
                            
                      