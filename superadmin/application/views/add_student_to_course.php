<?php $this->load->view('template/body'); ?>


<div class="tabs__form w-100">
          <div class="form__details w-100">
            <form method="post" action="<?php echo base_url(); ?>master/add_student_to_course_done" class="w-100">
              <h2>إضافة طالب إلى صف دراسي تجريبي في مدرسة تدريبية</h2>
              <div class="row">
                <div class="col-md-6">
                  <div class="input_form">
                    <label for=""> اسم الطالب </label>
                    <select
                      name="student_id"
                      id="gender"
                      class="form-select form-control"
                    >
                      <option selected disabled>اسم الطالب</option>
                      <?php foreach($students as $s){ ?>
                      <option value="<?php echo $s->id; ?>"><?php echo $s->first_name .' '.$s->last_name; ?></option>
                      <?php } ?>
                     
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input_form">
                    <label for=""> القسط الكامل </label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder=" "
                      name="amount"
                      value="<?php echo $course->cost; ?>"
                    />
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
      </div>
    </div>


 
 <?php $this->load->view('template/footer'); ?>