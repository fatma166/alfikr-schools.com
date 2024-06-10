<?php $this->load->view('template/body'); ?>


<script>
	function change_fields(type){
		if(type == "خيار متعدد"){
			document.getElementById("multichoic").style.display = "block";
			document.getElementById("textchoice").style.display = "none";
		
		}
		else{
			document.getElementById("multichoic").style.display = "none";
			document.getElementById("textchoice").style.display = "block";
		
		}
	}
	
	function change_question(id, type, number){
		if(type == "نص"){
			document.getElementById(id).innerHTML = '<textarea name="answer_'+number+'" class="form-control"></textarea>';
		}
		else{
			document.getElementById(id).innerHTML = '<input type="file" name="answer_'+number+'"  class="form-control" />';
		}
	}

</script>

<script>
	
	
	function fetch_subjects_by_course_type(id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_subjects_by_course_type",
                data: {'id': id}

            }).done(function (msg) {
                    document.getElementById("subjects").innerHTML = msg;
            });
		}
</script>


<form method="post" action="<?php echo base_url(); ?>master/add_new_qeustion_bank_done" enctype="multipart/form-data">
				<table class="table">
					<tr>
						<td>المرحلة الدراسية</td>
						<td>
							<select name="course_type_id" onchange="fetch_subjects_by_course_type(this.value);" >
								<?php foreach($courses_types as $c){ ?>
								<option value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
								<?php } ?>
							
							</select>
						</td>
						<td>المادة</td>
						
						<td >
							<select name="subject_id" id="subjects"> 
							
							
							</select>
						</td>
							
					</tr>
					<tR>
						<td>صورة السؤال</td>
						<td>
							<input type="file" name="image" class="form-control" />
						</td>
						<td>فيديو السؤال</td>
						<td>
							<input type="file" name="video" class="form-control" />
						</td>
					
						
					</tr>
					<tR>
						<td>اسم السؤال</td>
						<td>
							<input type="text" name="name" class="form-control" />
						</td>
						
						<td>نوع السؤال</td>
						<td>
							<select name="question_type" class="form-control" onchange="change_fields(this.value);">
								<option value="0">الرحاء اختيار النوع</option>
								<option value="خيار متعدد">خيار متعدد</option>
								<option value="سؤال كتابي">سؤال كتابي</option>
							
							</select>
						</td>
					</tR>
					<tr>
						<td>النص</td>
						<td colspan="3">
							<textarea name="text" class="form-control"></textarea>
						</td>
					
					</tr>
					<tr>
						<td>
							الترتيب
						</td>
						<td>
							<input type="text" name="ordering" class="form-control" style="width: 100px;" />
						</td>
						<td>
							الدرجة
						</td>
						<td>
							<input type="text" name="grade" class="form-control" style="width: 100px;" />
						</td>
					</tr>
					
				</table>
				<div id="multichoic" class="table-resposive" style="width: 100%; display: none">
				<table class="table"  width="100%" >
					
					<?php for($i = 1; $i <= 5; $i++){ ?>
					<tr id="question_answer_<?php echo $i; ?>">
						<td style="width: 200px;">نوع الجواب <?php echo $i ; ?></td>
						<td style="width: 200px;">
							<select style="width: 200px;"  name="answer_type_<?php echo $i; ?>" onchange="change_question('question_<?php echo $i; ?>', this.value, <?php echo $i ; ?>)">
								<option value="0">الرجاء اختيار نوع الإجابة</option>
								<option value="صورة">صورة</option>
								<option value="فيديو">فيديو</option>
								<option value="نص">	نص</option>
							</select>
						
						</td>
						
					
						<td style="width: 200px;">الجواب <?php echo $i; ?></td>
						<td id="question_<?php echo $i; ?>">
							
						
						</td>
					</tr>
					
					<?php } ?>
					<tR id="multi_right_answer">
						<td>الإجابة الصحيحة</td>
						<td>
							<select name="multi_right_answer" class="form-control" style="width: 100px;">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								
							</select>
						</td>
					</tR>
					
					
				</table>
				
				</div>
				<div id="textchoice" style="width: 100%; display: none" >
					<table width="100%">
						<tr>
						<td>الإجابة الصحيحة</td>
						<td>
							<textarea class="form-control" name="right_answer" ></textarea>
						</td>
					</tr>
					</table>
				</div>
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>

 <?php $this->load->view('template/footer'); ?>