<?php $this->load->view('template/body'); ?>









<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة مجموعة جديدة</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 
				<form method="post" action="<?php echo base_url(); ?>master/add_new_qeustion" enctype="multipart/form-data">
				<table class="table">
					<tR>
						<td>صورة السؤال</td>
						<td>
							<input type="file" name="img" />
						</td>
					</tR>
					<tR>
						<td>الإجابة الصحيحة</td>
						<td>
							<select name="right_answer" class="form-control" style="width: 100px;">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								
							</select>
						</td>
					</tR>
					<tR>
						<td>النص</td>
						<td>
							<textarea name="text" class="form-control"></textarea>
						</td>
					</tR>
					<tr>
						<td>
							الترتيب
						</td>
						<td>
							<input type="text" name="ordering" class="form-control" style="width: 100px;" />
						</td>
					</tr>
				</table>
				<input type="hidden" name="questions_group_id" value="<?php echo $questions_group_id; ?>" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>







<script>
function change_questions_ordering(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_questions_ordering",
                data: {'id': id, 'value': value}

            }).done(function (msg) {
                   alert("تم تغيير الترتيب");
            });
}
</script>


<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">أسئلة الامتحان</h4>
						  <button style="float: left;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">
							سؤال جديد
						  </button>
						</div>
						<div class="box-body">
						  <table class='table'>
								<tr>
									<th style="text-align: right"><?php echo $words["id"]; ?></th>
									<th style="text-align: right">السؤال</th>
									<th style="text-align: right">الإجابة الصحيحة</th>
									<th style="text-align: right">الترتيب</th>
									<th style="text-align: right">الصورة</th>
									<th style="text-align: right">العلامة</th>
								
									<th style="text-align: right">حذف</th>
									
									
									
								

								</tr>
						<?php 
							foreach($questions as $b){
						?>
								<tr>
									<td><?php echo $b->id; ?></td>
									<td><img src="<?php echo base_url(); ?>uploads/<?php echo $b->image; ?>" width="200" /></td>
									<td><?php echo $b->right_answer; ?></a></td>
								
									<Td>
										<input type="text" class="form-control" style="width: 100px;" value="<?php echo $b->ordering; ?>" onchange="change_questions_ordering(<?php echo $b->id; ?>, this.value);"
									</Td>
								
									
							
									<td><a href="<?php echo base_url(); ?>master/delete_question/<?php echo $b->id; ?>/<?php echo $exam_id; ?>">حذف</a></td>
								</tr>
						
						<?php
							}
						?>
					</table>
							
						  
						  
						  
						</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>
        
   

    </div>
				</div>
			</div>
		</section>      
 
 
 <?php $this->load->view('template/footer'); ?>