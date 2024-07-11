<?php $this->load->view('template/body'); ?>
		

<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">الاساتذة </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>eschool/student/"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم الإداري</li>
								<li class="breadcrumb-item active" aria-current="page">الاساتذة</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>
		
		

<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">جميع المدرسين</h4>
						</div>
						<div class="box-body">

		
		
		
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel"> 
            <div class="x_content">
                <div class="dashboard-widget-content">
                    <table class='table table-striped table-bordered'  id="datatable">
                        <thead>
                            <tr>
                                <th style="text-align: right">اسم المدرس</th>
                                <th style="text-align: right">صورة المدرس</th>
                                <th style="text-align: right">اسم المادة</th>
                                <th style="text-align: right">التواصل مع المدرس</th>
                                <th style="text-align: right">تقديم شكوى</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php //var_dump($teachers5); ?>
                            <?php 
                                foreach($teachers5 as $t){
                                // var_dump($teachers);
                            ?>
                            <tr>
                                <td><?php echo $t->full_name;?></td>
                                <td style="text-align: center">
                                    <?php if($t->image){ ?>
                                        <img width="50" src="<?php echo base_url().'../uploads/'.$t->image; ?>"  />
                                            <?php } else { ?>
                                                <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                    <?php  } ?>
                                </td>
                                <td><?php echo $t->details;?></td>		
                                <td>
                               
									<button onclick="document.getElementById('teacher_id').value =<?php echo $t->id; ?>;"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">
										مراسلة
									  </button>

								</td>
								<td>
									
									<button onclick="document.getElementById('comp_teacher_id').value =<?php echo $t->id; ?>;"  type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
										إضافة شكوى
									  </button>
									
									
								</td>
                            </tr>
                            <?php } ?>
                        </tbody>	
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php if($this->input->get('msg') == 'send_msg_done'){ ?>
	<script>
		alert('تم إرسال الرسالة بنجاح');
	</script>
<?php } ?>


<?php if($this->input->get('msg') == 'send_compliant_done'){ ?>
	<script>
		alert('تم إرسال الشكوى بنجاح');
	</script>
<?php } ?>


 <div class="modal center-modal fade" id="modal-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إرسال رسالة</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 	  
			<form method="post" action="<?php echo base_url(); ?>master/send_teacer_messaage"  enctype="multipart/form-data">
			<table class='table table-striped '>
				<tr>
					<td>
					      <textarea class="form-control"  name="message" style="width: 100%" id="message" placeholder="محتوى الرسالة" required></textarea>
					</td>
				</tr>
				
				
						   
			</table>

					
			<input type="hidden" name="teacher_id" value="0" id="teacher_id" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إرسال</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>
	
	
	
	<div class="modal center-modal fade" id="modal-warning" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إرسال شكوى</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 	  
			<form method="post" action="<?php echo base_url(); ?>master/add_complaint"  enctype="multipart/form-data">
			<table class='table table-striped '>
				<tr>
					<td>
					      <textarea class="form-control"  name="compliant" style="width: 100%" id="message" placeholder="محتوى الشكوى" required></textarea>
					</td>
				</tr>
				
				
						   
			</table>

					
			<input type="hidden" name="teacher_id" value="0" id="comp_teacher_id" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إرسال</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>



						</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>
 
 <?php $this->load->view('template/footer'); ?>
