<?php $this->load->view('template/head'); ?>


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


 <div class="tabs__form w-100">
            <div class="form__details w-100">
                <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>master/add_new_qeustion_bank_done" method="post" class="">
                  <div class="row">
                    <h2>إضافة سؤال جديد
                    </h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input_form">
                                <label for=""> المرحلة الدراسية </label>
                                <select name="course_type_id" onchange="fetch_subjects_by_course_type(this.value);" >
								<?php foreach($courses_types as $c){ ?>
								<option value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
								<?php } ?>
								</select>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input_form">
                                <label for=""> المادة </label>
                                <select name="subject_id" id="subjects"> </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="mb-2"> صورة السؤال </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="image" id="formFile">
                                <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                        </div>
						<div class="col-md-12">
                            <label for="" class="mb-2"> فيديو السؤال </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="video" id="formFile">
                                <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input_form">
                                <label for=""> اسم السؤال </label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input_form">
                                <label for=""> نوع السؤال </label>
                                <select name="question_type" class="form-control" onchange="change_fields(this.value);">
								<option value="0">الرحاء اختيار النوع</option>
								<option value="خيار متعدد">خيار متعدد</option>
								<option value="سؤال كتابي">سؤال كتابي</option>
								</select>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input_form">
                                <label for=""> النص </label>
                                <textarea name="text" class="form-control"></textarea>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input_form">
                                <label for=""> الترتيب </label>
                                <input type="text" name="ordering" class="form-control" style="width: 100px;" />
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input_form">
                                <label for=""> الدرجة </label>
                                <input type="text" name="grade" class="form-control" style="width: 100px;" />
                            </div>
                        </div>
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
                      	<div class="btn__save">
                        	<button>حفظ</button>
                      	</div>
                </form>
            </div>
          </div>
	
	
	
	
	
	
	
	<?php $this->load->view('template/footer'); ?>

