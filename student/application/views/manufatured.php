       
		<div class="pav-container " >
	        	<div class="pav-inner">
	      
	    <div class="row row-level-1 "><div class="row-inner  clearfix" >
	        	            <div class="pav-col col-lg-11 col-md-12 col-sm-12 col-xs-12 info col-lg-12 "><div class="col-inner">
	                	                		                     		


    <div id="pavcarousel7" class="box carousel slide pavcarousel  hidden-sm hidden-xs">
        <div class="box-heading">
            <span>الجامعات</span>
        </div>
        <div class="box-content">
            <div class="carousel-inner">
                
                                
                        
						<?php $i = 0; ?>
						<?php foreach($universities as $u){ ?>
                        <?php if($i % 6 == 0){ ?>
						<div class="item <?php if($i == 0){ ?>active<?php } ?>" >
						<div class="row">
						<?php } ?>
                        <div class="col-lg-1.5 col-xs-6 col-sm-2">
                            <div class="item-inner">
                                <a href="<?php echo base_url(); ?>universities/show_university/<?php echo $u->id; ?>">
									<img src="<?php echo base_url(); ?>uploads/<?php echo $u->image; ?>" alt="<?php echo $u->ar_name; ?>" style="max-height: 100px;" class="img-responsive" />
								</a>
                            </div>
                        </div>
						<?php if($i % 6 == 5){ ?> </div> </div> <?php } ?>  
						<?php $i++; ?>
						
						<?php } ?>
                                                       
                        </div></div>
                                
                            </div>
                        <div class="carousel-controls">
                <a class="carousel-control left" href="#pavcarousel7" data-slide="prev">
                    <em class="fa fa-angle-left"></em>
                </a>
                <a class="carousel-control right" href="#pavcarousel7" data-slide="next">
                    <em class="fa fa-angle-right"></em>
                </a>
            </div>
                    </div>
    </div>
<script type="text/javascript"><!--
 $('#pavcarousel7').carousel({interval:3000});
--></script>


                   			                	                	            </div></div>
	        	    </div></div>
	    	            </div>
	        </div>
			
			
			