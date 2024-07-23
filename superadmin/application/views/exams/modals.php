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
			 
				<form method="post" action="<?php echo base_url(); ?>master/add_exam_qeustion" enctype="multipart/form-data">
				<table class="table">
					<tR>
						<td>السؤال</td>
						<td>
							<select name="question_id">
								<option value="0">الرجاء اختيار السؤال</option>
								<?php foreach($all_questions as $q){ ?>
								<option value="<?php echo $q->id; ?>">
									<?php echo $q->text; ?>
								</option>
								
								<?php } ?>
							</select>
						</td>
					</tR>
					
					<tR>
						<td>العلامة</td>
						<td>
							<input type="text" name="grade" class="form-control" style="width: 100px;" />
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
				<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>




<div class="modal center-modal fade" id="group-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة مجموعة جديدة</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 
				<form method="post" action="<?php echo base_url(); ?>master/new_exam_group" enctype="multipart/form-data">
				<table class="table">
					<tR>
						<td>اسم المجموعة</td>
						<td>
							<input type="text" name="name" class="form-control" />
						</td>
					</tR>
					<tR>
						<td>الصورة</td>
						<td>
							<input type="file" name="img" />
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
				<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>
	
	
	
	
	<div class="modal center-modal fade" id="add-group-question" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة سؤال جديد</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 
				<form method="post" action="<?php echo base_url(); ?>master/new_exam_group_question" enctype="multipart/form-data">
				<table class="table">
					<tR>
						<td>السؤال</td>
						<td>
							<select name="question_id">
								<option value="0">الرجاء اختيار السؤال</option>
								<?php foreach($all_questions as $q){ ?>
								<option value="<?php echo $q->id; ?>">
									<?php echo $q->text; ?>
								</option>
								
								<?php } ?>
							</select>
						</td>
					</tR>
					
					<tR>
						<td>العلامة</td>
						<td>
							<input type="text" name="grade" class="form-control" style="width: 100px;" />
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
				<input type="hidden" name="group_id" id="group_id" value="0" />
				<input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>