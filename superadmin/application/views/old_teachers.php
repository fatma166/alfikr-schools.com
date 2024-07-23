<?php $this->load->view('template/body'); ?>



<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">المدرسون </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم الإداري</li>
								<li class="breadcrumb-item active" aria-current="page">المدرسون</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>
		


<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة استاذ جديد</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 <form method="post" action="<?php echo base_url(); ?>master/add_teacher" enctype="multipart/form-data">
				<table class="table">
					<tr>
						<td>الاسم الكامل</td>
						<td><input type="text" name="full_name" class="form-control" /></td>
					</tr>
				   
					<tr>
						<td>الاختصاص</td>
						<td><input type="text" name="details" class="form-control" /></td>
					</tr>
				   
					<tr>
						<td>الصورة</td>
						<td><input type="file" name="img" class="form-control" /></td>
					</tr>
				   
					<tr>
						<td>المادة</td>
						<td>
							<select name="main_subject_id" class="form-control" style="width: 100%"	>
								<?php foreach($main_subjects as $m){ ?>
								<option value="<?php echo $m->id; ?>"><?php echo $m->name; ?></otpion>
								<?php } ?>	
							</select>


						</td>
					</tr>
					
					
				</table>
				
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>


<div class="modal center-modal fade" id="modal-add-subject" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة مادة للاستاذ</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 <form method="post" action="<?php echo base_url(); ?>master/add_teacher_subject" enctype="multipart/form-data">
				<table class="table">
					
				   
					<tr>
						<td>المادة</td>
						<td>
							<select name="subject_id" class="form-control" style="width: 100%"	>
								<?php foreach($main_subjects as $m){ ?>
								<option value="<?php echo $m->id; ?>"><?php echo $m->name; ?></otpion>
								<?php } ?>	
							</select>


						</td>
					</tr>
					
					
				</table>
				
			
			<input type="hidden" name="teacher_id" id="subject_teacher_id" value="0" />
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>





<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">جميع الاساتذة</h4>
						   <button style="float: left;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">
							مدرس جديد
						  </button>
						</div>
						<div class="box-body">
						  <table class='table '>
			<tr >
				
				<th style="text-align: right">الرقم</th>
				
				<th style="text-align: right">الصورة</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">اسم المدرسة</th>
				<th style="text-align: right">المواد</th>
			
				<th style="text-align: right">تعديل</th>
		
				
			</tr>
	<?php
	    $i = 1;
		foreach($teachers as $s){
		
	?>
			<tr  class="student_row">
				
				<td><?php echo $s->id; ?></td>
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $s->image; ?>" width="150" /></td>
				<td><?php echo $s->full_name; ?></td>
				<td><?php echo $s->school_name; ?></td>
				<td>
				<?php foreach($s->subjects as $ss){ ?>
					<?php echo $ss->name; ?>
					 <a href="<?php echo base_url(); ?>master/delete_teacher_subject/<?php echo $ss->id; ?>/<?php echo $s->id; ?>">×</a>
					  <br />
				<?php } ?>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-subject" onmouseover="document.getElementById('subject_teacher_id').value=<?php echo $s->id; ?>">
							إضافة مادة جديدة
						  </button>
				</td>
			
				
				
			
				<td><a href="<?php echo base_url(); ?>master/edit_teacher/<?php echo $s->id; ?>">تعديل</a></td>
			</tr>
	
	<?php
	        $i++;
		}
	?>
	
	<?php 
		$this->load->helper('url');


		$currentURL = current_url();

		$params   = $_SERVER['QUERY_STRING']; 

		$fullURL = $currentURL . '?' . $params; 

		$this->session->set_userdata('products_url', $fullURL); 
	?>
</table>
						</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>


           

          
 
 
 <?php $this->load->view('template/footer'); ?>