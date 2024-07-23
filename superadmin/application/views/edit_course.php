<?php $this->load->view('template/body'); ?>



<div class="tabs__form w-100">
            <div class="form__details w-100">
                <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>master/edit_course_done" method="post" class="">
                  <div class="row">
                    <h2>تعديل البيانات
                    </h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input_form">
                                <label for=""> الاسم </label>
                                <input type="text" value="<?php echo $course->name; ?>" name="ar_name" class="form-control" placeholder="اسم المرحلة الدراسية">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input_form">
                                <label for=""> التكلفة </label>
                                <input type="text" value="<?php echo $course->cost; ?>" name="cost" class="form-control" placeholder="اسم المرحلة الدراسية">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="mb-2"> الصورة </label>
							<img src="<?php echo base_url(); ?>../uploads/<?php echo $course->image; ?>" width="200" />
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" type="file" name="img" id="formFile">
                                <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                          </div>
						<div class="col-md-6">
                            <div class="input_form">
                                <label for=""> المرحلة </label>
                                <select style="width: 100%" name="course_type">
								<?php foreach($courses_types as $c){ ?>
								<option <?php if($c->id == $course->course_type){ ?>selected<?php } ?> value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
								<?php } ?>
								
								</select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input_form">
                                <label for=""> المدرسة </label>
                                <select style="width: 100%" name="school_id">
								<?php foreach($schools as $s){ ?>
								<option <?php if($s->id == $course->school_id){ ?>selected<?php } ?> value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
								<?php } ?>
								
								</select>
                            </div>
                        </div>
                        
                      <div class="btn__save">
                        <button>حفظ</button>
                      </div>
					  <input type="hidden" name="id" value="<?php echo $course->id; ?>" />
                </form>
            </div>
          </div>
      </div>
    </div>





 
 <?php $this->load->view('template/footer'); ?>
