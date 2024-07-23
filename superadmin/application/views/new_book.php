

<?php $this->load->view('template/head'); ?>


<div class="tabs__form w-100">
            <div class="form__details w-100">
                <form method="post" action="<?php echo base_url(); ?>master/new_book"  enctype="multipart/form-data">
                 <div class="row">
                    <h2>إضافة كتاب
                    </h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input_form mt-2">
                                <label for=""> اسم الكتاب </label>
                                <input type="text" name="name" class="form-control" required placeholder="اسم الكتاب">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="input_form mt-2">
                                <label for=""> معلومات عن الكتاب </label>
                                <textarea type="text" class="form-control" name="about" placeholder="معلومات عن الكتاب"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input_form">
                            <label for=""> المرحلة </label>
                            <select
                              name="course_type_id"
                              id="gender"
                              class="form-select form-control"
                              onchange="fetch_subjects_by_course_type(this.value)"
                            >
                              <?php foreach($courses_types as $c){ ?>
            					<option value="<?php echo $c->id; ?>">
            					<?php 
                                    
                                    echo $c->ar_name;
                                  ?>    
            					    
            					    
            					</option>
            				<?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input_form">
                            <label for=""> المادة </label>
                            <select
                              name="main_subject_id" id="subjects"
                              class="form-select form-control" required onchange="document.getElementById('btn__save').disabled = false;"
                            >
                              <option value="0" disabled>الرجاء اختيار المادة</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mb-2"> صورة الكتاب </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="img" id="formFile">
                                <img src="../../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <label for="" class="mb-2"> الكتاب </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="link" id="formFile">
                                <img src="../../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                          </div>
                      <div class="btn__save" >
                        <button id="btn__save" >حفظ</button>
                      </div>
                </form>
            </div>
          </div>
      </div>
    </div>
	
	
	
	
	
	<?php $this->load->view('template/footer'); ?>
	
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
