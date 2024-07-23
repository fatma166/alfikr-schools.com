<?php $this->load->view('template/body'); ?>


<div class="tabs__form w-100">
            <div class="form__details w-100">
                <form method="post" action="<?php echo base_url(); ?>master/add_teacher_to_course_done">
                  <div class="row">
                    <h2>إضافة مدرس إلى صف  <?php echo $course->name; ?>
                    </h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="input_form mt-2">
                                <label for=""> اسم المدرس </label>
                                
                                <select
                      name="teacher_id"
                      id="gender"
                      class="form-select form-control"
                    >
                      <option selected disabled>اسم المدرس</option>
                    <?php foreach($teachers as $t){ ?>
                    <option value="<?php echo $t->id; ?>"><?php echo $t->full_name; ?></option>
                    <?php } ?>
                    </select>
                                
                                
                            </div>
                        </div>
                    </div>
                  <div class="btn__save">
                    <button>حفظ</button>
                  </div>
                  	<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
                </form>
            </div>
          </div>



 
 <?php $this->load->view('template/footer'); ?>