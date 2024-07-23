<?php $this->load->view('template/head'); ?>



<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2> إضافة شهادة </h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  إضافة شهادة
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="tabs__form w-100">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              </ul>
              <div class="tab-content form__details" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                    <form method="post" action="<?php echo base_url(); ?>master/new_certificate_done" class="">
                        <div class="row">
                            <div class="col-md-6">
                  <div class="input_form">
                    <label for=""> المرحلة الدراسية </label>
                    <select
                    required
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
                    required
                      name="course_id"
                      id="courses"
                      class="form-select form-control"
                      onchange="fetch_students_by_course(this.value)"
                    >
                      <option selected disabled>الفصل الدراسي</option>
                      
                     
                    </select>
                  </div>
                  </div>
                
              
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم الطالب </label>
                                    <select
                      name="student_id"
                      id="students"
                      required
                      class="form-select form-control"
                    >
                      <option selected disabled>اسم الطالب</option>
                      
                     
                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for="">  تاريخ الأصدار </label>
                                    <input type="date" name="date" required class="form-control" placeholder="تاريخ الأصدار ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم النموذج </label>
                                    <select
                                    name="cert_type"
                                    id="gender"
                                    required
                                    class="form-select form-control"
                                >
                                    <option selected disabled>اسم النموذج</option>
                                    <?php foreach($cert_types as $c){ ?>
                                    <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
                                    <?php }  ?>
                                </select>                            
                                </div>
                            </div>
                            </div>
                          
                        <div class="btn__save mt-2">
                            <button>حفظ</button>
                        </div>
                    </form>
                </div>
              </div>
        </div>
      </div>
    </div>


<script>
function fetch_regions(city_id){
		   //console.log(categories_array);
           $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>master/fetch_regions",
                data: {'city_id': city_id}

            }).done(function (msg) {
                    document.getElementById("regions_area").innerHTML = msg;
            });
		}
	</script>
	
	
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
		
		
		function fetch_students_by_course(course_id){
		    //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_students_by_course",
                data: {'course_id': course_id}

            }).done(function (msg) {
                    document.getElementById("students").innerHTML = msg;
            });
		}
</script>

 
 <?php $this->load->view('template/footer'); ?>
 
 <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
   
