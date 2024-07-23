<?php $this->load->view('template/body'); ?>


<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">

					  <div style="float: right"><h3>القسم العلمي / <?php echo $course->name; ?> / البرنامج الدراسي</h3></div>
					  <div style="float: left">
					  
					 		 <a href='<?php echo base_url(); ?>master/courses' class='btn btn-danger' style="display: inline-block;">
			
								عودة
							</a>
						
						
						</div>
					  </div>
  </div>
  
      </div>
  
</div>

 <script>
function fetch_subjects_teachers(main_subject_id){
		   //console.log(categories_array);
		 
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_subjects_teachers",
                data: {'main_subject_id': main_subject_id}

            }).done(function (msg) {
                    document.getElementById("teachers").innerHTML = msg;
            });
		}
	</script>
<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
						<h4>إضافة حصة جديدة</h4>
						<form method="post" action="<?php echo base_url(); ?>master/new_time_table">
							<table class="table">
								<tr>
								
									<td>
										
									<div class="row">
										<label class="col-md-12" for="example-text">الوقت</label>
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
        

									</td>
								</tr>
								<tr>
									<td>
									<div class="row">
									    <div class="col-lg-4">
										<select name="main_subject_id" style="width: 100%" onchange="fetch_subjects_teachers(this.value);">
											<option value="0">الرجاء اختيار المادة</option>
											<?php foreach($main_subjects as $t){ ?>
											<option value="<?php echo $t->id; ?>"><?php echo $t->name; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-lg-4">
										<select id="teachers" name="teacher_id" style="width: 100%">
											<option value="0">الرجاء اختيار المدرس</option>
											<?php foreach($teachers as $t){ ?>
											<option value="<?php echo $t->id; ?>"><?php echo $t->full_name; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-lg-4" >
										<select name="day" style="width: 100%">
											<option value="sunday">الأحد</option>
											<option value="monday">الاثنين</option>
											<option value="teusday">الثلاثاء</option>
											<option value="wednesday">الأربعاء</option>
											<option value="thursday">الخميس</option>
											 

										</select>

									</div>
									</td>


								</tr>
								<tr>
									<td>
									<div class="row">
									<div class="col-lg-8">
											<input name="title" type="text" placeholder="العنوان" class="form-control"  style="padding: 15px; height: 39px;"  />

									</div>
									<div class="col-lg-4">
									<input name="ordering" type="text" placeholder="الترتيب" class="form-control" style="padding: 15px; height: 39px;"  />

									</div>
									</div>
									</td>
								</tr>
								<tr><td aling="left"><input type="submit" value="إضافة" class="btn btn-success" /></td></tr>
							</table>

							<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
						</form>
					  </div>
  </div>
  
      </div>
  
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">


<table class="table table-striped">
	<tr>
		<td>
			الأحد	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
					<?php foreach($sunday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->subject_name; ?></p>
							<p>أ.<?php echo $t->teacher_name; ?></p>
							<p><?php echo $t->title; ?></p>
							<a class="btn btn-danger" href="<?php echo base_url(); ?>master/delete_time_table/<?php echo $t->id; ?>/<?php echo $course_id; ?>">
								حذف
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الاثنين	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($monday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->subject_name; ?></p>
							<p>أ.<?php echo $t->teacher_name; ?></p>
							<p><?php echo $t->title; ?></p>
							<a class="btn btn-danger" href="<?php echo base_url(); ?>master/delete_time_table/<?php echo $t->id; ?>/<?php echo $course_id; ?>">
								حذف
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الثلاثاء	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($teusday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->subject_name; ?></p>
							<p>أ.<?php echo $t->teacher_name; ?></p>
							<p><?php echo $t->title; ?></p>
							<a class="btn btn-danger" href="<?php echo base_url(); ?>master/delete_time_table/<?php echo $t->id; ?>/<?php echo $course_id; ?>">
								حذف
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الأربعاء	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($wednesday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->subject_name; ?></p>
							<p>أ.<?php echo $t->teacher_name; ?></p>
							<p><?php echo $t->title; ?></p>
							<a class="btn btn-danger" href="<?php echo base_url(); ?>master/delete_time_table/<?php echo $t->id; ?>/<?php echo $course_id; ?>">
								حذف
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td>
			الخميس	
		<td>
		<td>
			<table width="100%" class="table-striped">	
				<tr>
				<?php foreach($thursday_time_table as $t){ ?>
						<td>
							<h5><?php echo $t->start_time .' - ' . $t->end_time; ?></h5>
							<p><?php echo $t->subject_name; ?></p>
							<p>أ.<?php echo $t->teacher_name; ?></p>
							<p><?php echo $t->title; ?></p>
							<a class="btn btn-danger" href="<?php echo base_url(); ?>master/delete_time_table/<?php echo $t->id; ?>/<?php echo $course_id; ?>">
								حذف
							</a>
						</td>
					<?php } ?>
				</tr>
			</table>	
		</td>
	</tr>





</div>
</div>
</div>
</div>








<?php $this->load->view('template/footer'); ?>
