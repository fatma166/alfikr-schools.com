
<?php $this->load->view('template/head'); ?>

<div class="tabs__form w-100">
            <div class="form__details w-100">
                <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>master/edit_course_type_done" method="post" class="">
                  <div class="row">
                    <h2>تعديل مرحلة دراسية
                    </h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input_form">
                                <label for=""> اسم المرحلة الدراسية </label>
                                <input type="text" value="<?php echo $course_type->ar_name; ?>" name="ar_name" class="form-control" placeholder="اسم المرحلة الدراسية">
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="input_form">
                                <label for=""> المرحلة الأب </label>
                                <select style="width: 100%" name="parent_id">
								<?php foreach($courses_types as $c){ ?>
								<option <?php if($c->id == $course_type->parent_id){ ?>selected<?php } ?> value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
								<?php } ?>
								
								</select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="mb-2"> الصورة </label>
							<img src="<?php echo base_url(); ?>../<?php echo $course_type->image; ?>" width="200" />
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="img" id="formFile">
                                <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                          </div>
                      <div class="btn__save">
                        <button>حفظ</button>
                      </div>
					  <input type="hidden" name="id" value="<?php echo $course_type->id; ?>" />
                </form>
            </div>
          </div>
      </div>
    </div>
	
	<?php $this->load->view('template/footer'); ?>