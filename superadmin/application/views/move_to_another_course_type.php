<?php $this->load->view('template/body'); ?>


<div class="tabs__form w-100">
          <div class="form__details w-100">
            <form method="post" action="<?php echo base_url(); ?>master/move_to_another_course_type_done" class="w-100">
              <h2>نقل طلاب إلى مرحلة دراسية جديدة</h2>
              <div class="row">
                <div class="col-md-6">
                  <div class="input_form">
                    <label for=""> المرحلة الدراسية </label>
                    <select
                      name="course_type"
                      id="gender"
                      class="form-select form-control"
                      onchange="fetch_courses_by_course_type(this.value)"
                    >
                      <option selected disabled>المرحلة الدراسية</option>
                      <?php foreach($courses_types as $s){ ?>
                      <option value="<?php echo $s->id; ?>"><?php echo $s->ar_name; ?></option>
                      <?php } ?>
                     
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input_form">
                    <label for=""> الفصل الدراسي </label>
                    <select
                      name="course_id"
                      id="courses"
                      class="form-select form-control"
                    >
                      <option selected disabled>الفصل الدراسي</option>
                      
                     
                    </select>
                  </div>
                  </div>
                </div>
              </div>
              <div class="btn__save">
                <button>حفظ</button>
              </div>
              <input type="hidden" name="ids" value="<?php echo $this->input->get('ids'); ?>" />
            </form>
          </div>
        </div>
      </div>
    </div>


 
 <?php $this->load->view('template/footer'); ?>
 
 
 <script>
	
	
	function fetch_courses_by_course_type(id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_courses_by_course_type2",
                data: {'course_type': id}

            }).done(function (msg) {
                    document.getElementById("courses").innerHTML = msg;
            });
		}
</script>