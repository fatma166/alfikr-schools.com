<?php $this->load->view('template/body'); ?>


           <input type="button" onclick="location.href='<?php echo base_url(); ?>courses/my_courses'" class='btn btn-primary' style="width: 250px;" value='دوراتي' />
		<?php 
			
			foreach($courses as $row){
			
		
		
		
		?>	
			<div class="col-md-12 col-sm-12 col-xs-12" style="width: 100%;">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      
                          
                          <table  class="info_table" width="100%">
                             <tr>
								<td>
									<h3><?php echo $row->title; ?></h3>
								</td>
								<td align="left">
								<?php 
									//$user_id = $this->session->userdata('user_id');
									
									if($row->check){
								?>
								<input type="button" onclick="location.href='<?php echo base_url(); ?>courses/add_student_course/<?php echo $row->id; ?>/1'" class="btn " value="إلغاء التسجيل" />
								<?php
									}
									else{
								?>
								<input type="button" onclick="location.href='<?php echo base_url(); ?>courses/add_student_course/<?php echo $row->id; ?>/0'" class="btn btn-success" value="تسجيل في الدورة" />
								
								<?php
									}
								?>
									
								</td>
                             </tr>
							 <tr>
								<td colspan="2">
									<?php echo $row->about; ?>
								</td>
							 </tr>
							 <tr>
								<td style="color: green;" colspan="2">
									التكلفة: <?php echo $row->cost; ?>
								</td>
							  </tr>
                          </table>
                          
                          
                          
                       
                    </div>
            </div>
            </div>
		<?php
			}
		?>
          

          

           

           

          
 
 
 <?php $this->load->view('template/footer'); ?>