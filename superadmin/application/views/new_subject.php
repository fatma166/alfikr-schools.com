

<?php $this->load->view('template/head'); ?>


 <div class="tabs__form w-100">
            <div class="form__details w-100">
                 <form method="post" action="<?php echo base_url(); ?>master/new_main_subject"  enctype="multipart/form-data">
				
			 <div class="row">
                    <h2>إضافة مادة
                    </h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input_form">
                                <label for=""> اسم المادة </label>
                                <input type="text" name="name" class="form-control" placeholder="اسم المادة">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input_form">
                            <label for=""> المرحلة </label>
                            <select
                              name="course_type"
                              id="gender"
                              class="form-select form-control"
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
                        
                        <div class="col-md-12">
                            <label for="" class="mb-2"> الصورة </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="img" id="formFile">
                                <img src="../../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                          </div>
                      <div class="btn__save">
                        <button>حفظ</button>
                      </div>
                </form>
            </div>
          </div>
      </div>
    </div>
	
	
	
	
	
	
	
	<?php $this->load->view('template/footer'); ?>
