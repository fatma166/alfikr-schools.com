
<?php $this->load->view('template/body'); ?>





<form method="post" action="<?php echo base_url(); ?>master/new_live_class_done"  enctype= 'multipart/form-data'>
					<div class="row">
                    <div class="col-sm-6">
	
					<div class="form-group">
                 		<label class="col-md-12" for="example-text">العنوان</label>
                    	<div class="col-sm-12">
							<input type="text" class="form-control" name="title" required>

						</div>
					</div>
					
					<div class="form-group">
                 		<label class="col-md-12" for="example-text">Meeting ID</label>
                    	<div class="col-sm-12">
							<input type="text" class="form-control" name="meeting_id" required>

						</div>
					</div>
					
					<div class="form-group">
                 		<label class="col-md-12" for="example-text">Meeting Password</label>
                    	<div class="col-sm-12">
							<input type="text" class="form-control" name="meeting_password" required>

						</div>
					</div>
					
					<div class="form-group">
                 		<label class="col-md-12" for="example-text">الدورة</label>
                    	<div class="col-sm-12">
							<select name="course_id" class="form-control select2" style="width:100%"id="class_id" onchange="return get_class_sections(this.value)">
                              <option value="">الرجاء الاختيار</option>
                              <?php foreach($courses as $c){ ?>
                                <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
                              
                              <?php } ?>
                              
                          </select>
						</div> 
					</div>
					
					
					<div class="form-group">
                 			<label class="col-md-9" for="example-text">المحتوى</label>
                    		<div class="col-sm-12">
		                        <select name="section_id" class="form-control" style="width:100%" id="section_selector_holder">
		                            <option value=""></option>
			                    </select>
			                </div>
					</div>
				
			</div>	
					
					 <div class="col-sm-6">
					 
						 <div class="form-group">
							<label class="col-sm-12">التاريخ</label>
							<div class="col-sm-12">
								 <input type="date" class="form-control datepicker" name="date" value="<?php echo date('Y-m-d');?>" required>
							</div> 
					</div>
					
					
		 <!-- .row -->
                            <div class="row">
							<label class="col-md-12" for="example-text">وثت البث</label>
                                <div class="col-lg-6">
                                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                        <input type="text" name="start_time" class="form-control" value="13:14">
                                        <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> 
                                    </div>
									<label class="col-md-12" for="example-text">وقت البداية</label>
                                </div>
								
                                <div class="col-lg-6">
                                    <div class="input-group clockpicker " data-placement="left" data-align="top" data-autoclose="true">
                                        <input type="text" name="end_time" class="form-control" value="13:14">
                                        <span class="input-group-addon"> <span class="glyphicon glyphicon-time">
										</span> 
                                    </div>
									<label class="col-md-12" for="example-text">وقت النهاية</label>
                                </div>

					</div>
        
                <!-- /.row -->
				<hr class="sep-3">
				
				<div class="form-group">
                 		<label class="col-md-12" for="example-text">Remarks</label>
                    	<div class="col-sm-12">
                			<textarea rows="5" name="remarks" class="form-control" placeholder="please specify meeting remarks here" ></textarea>
						</div>
            	</div>
				
			
				
				
		

		</div>
	</div>
					
		<input type="submit" class="btn btn-success btn-rounded btn-block btn-sm" value="حفظ">               
                    
             
				</form>	
				
				
<script type="text/javascript">

	function get_class_sections(course_id) {

    	$.ajax({
            url: '<?php echo base_url();?>master/get_course_sections/' + course_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

</script>

				
				
				
				
				
				
				
				
				
				
				
				<?php $this->load->view('template/footer'); ?>