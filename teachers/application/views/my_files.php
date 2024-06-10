
<?php $this->load->view('template/body'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">




            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                        <h4>الوصولات</h4>
                    </div>
                     <div class="x_content">
                      <div class="dashboard-widget-content">
                        
                         <?php
                            foreach($files as $row){
                                echo "<a class='example-image-link' href='$row->file' data-lightbox='example-set' data-title=''><img src='$row->file' width='100' height='100' style='border: solid 1px #006699; margin: 5px;' /></a>";
                            }
                         ?>
                        
                     
                      </div>
                    </div>
            </div>
            </div>



            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                        <h4>الوظائف</h4>
                    </div>
                     <div class="x_content">
                      <div class="dashboard-widget-content">
                        
                         <?php
                            foreach($hw as $row){
                                echo "<a class='example-image-link' href='$row->file' data-lightbox='example-set' data-title=''><img src='$row->file' width='100' height='100' style='border: solid 1px #006699; margin: 5px;' /></a>";
                            }
                         ?>
                        
                     
                      </div>
                    </div>
            </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            <script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
			
			
			 <?php $this->load->view('template/footer'); ?>