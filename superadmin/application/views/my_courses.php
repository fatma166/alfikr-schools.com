<?php $this->load->view('template/body'); ?>


			<div class="col-md-12 col-sm-6 col-xs-12" width="100%">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>دوراتي</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    
                     
						<?php
							
							$i = 1;
							foreach($courses  as $row){
								
								
						?>
					   <p> <H5><?php echo $i; ?> - <?php echo $row->title; ?></H5>
                          
                          <p>عدد الدروس: <?php echo $row->nof_lessons; ?></p>
                          <p><input type="button" onclick="location.href='<?php echo base_url(); ?>/courses/view_course/<?php echo $row->course_id; ?>'" value="الذهاب إلى صفحة الدورة" class="btn btn-success" /></p>
                        </p>
                        <hr />
                       <?php
								$i++;
							}
						?>
                   

                  </div>
                </div>
              </div>

<?php $this->load->view('template/footer'); ?>