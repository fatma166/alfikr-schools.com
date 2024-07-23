<?php $this->load->view('template/head'); ?>
<?php if($this->input->get('msg') == "email_exist"){ ?>
<script>
   alert('عذرا .. البريد الالكتروني موجود مسبقاً') ;
</script>
<?php } ?>



<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>إضافة طالب</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  الطلاب
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="tabs__form w-100">
          <form class="form__details w-100 mt-1" method="post"  enctype="multipart/form-data" action="<?php echo base_url(); ?>master/approve_student_request_done">
            <div class="row">
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> الإسم الأول </label>
                  <input
                    type="text"
                    name="first_name"
                    class="form-control"
                    placeholder="الإسم الأول"
                    value = "<?php echo $request_info->first_name; ?>"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> الإسم الثاني </label>
                  <input
                    type="text"
                    class="form-control"
                    name="last_name"
                    placeholder="الإسم الثاني"
                    value = "<?php echo $request_info->last_name; ?>"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> الموبايل</label>
                  <input
                    type="text"
                    class="form-control"
                    name="mobile" 
                    placeholder="الموبايل"
                    value = "<?php echo $request_info->mobile; ?>"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> البريد الألكتروني</label>
                  <input
                    type="text"
                    name="email"
                    class="form-control"
                    placeholder="البريد الألكتروني"
                    value = "<?php echo $request_info->email; ?>"
                  />
                </div>
              </div>
              <div class="col-md-12">
                <label for=""> الصورة الشخصية </label>
                <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                        style="gap: 8px">
                    <input class="form-control" name="img" type="file" id="formFile">
                    <input type="hidden" name="request_img" value="<?php echo $request_info->picture; ?>" />
                    <img src="<?php echo base_url(); ?>../uploads/<?php echo $request_info->picture; ?>" alt="download" alt="download"
                            loading="lazy" width="40" height="40"/>
                    <span> اضغط او قم بالسحب </span>
                    <p>png, jpg, jpeg (max. 800x400px)</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> المدرسة </label>
                  <select
                    name="school_id"
                    id="school_id"
                    id="gender"
                    class="form-select form-control"
                    onchange="document.getElementById('course_type').disabled = false;"
                  >
                    <option value="0">الرجاء اختيار المدرسة</option>
					<?php foreach($schools as $s){ ?>
					<option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
					
					<?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> المرحلة </label>
                  <select
                     name="coure_type" id="course_type"
                     onchange="fetch_courses_by_course_type(this.value); "
                  
                    class="form-select form-control"
                  >
                    <option value="0">الرجاء اختيار المرحلة الدراسية</option> 
    				<?php foreach($courses_types as $c){ ?>
    				
    				<option value="<?php echo $c->id; ?>" <?php if($request_info->course_type == $c->id){ ?>selected<?php } ?>><?php echo $c->ar_name; ?></option>
    				<?php } ?>
    				</select>
                  </select>
                </div>
              </div>
             
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> الشعبة </label>
                  <select
                    name="course_id" id="course_id"
                    class="form-select form-control"
                  >
                    
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input_form">
                  <label for="">كلمة السر</label>
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="كلمة السر"
                  />
                </div>
              </div>
            </div>
            <div class="btn__save">
                        <button>حفظ</button>
                      </div>
                      
                      <input type="hidden" name="request_id" value="<?php echo $request_info->id; ?>" />
          </form>
        </div>
      </div>

 
 <?php $this->load->view('template/footer'); ?>
 
 
 
 <script>

	
function fetch_courses_by_course_type(id){
		   //console.log(categories_array);
		   school_id = document.getElementById('school_id').value;
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_courses_by_course_type",
                data: {'course_type': id, 'school_id':school_id}

            }).done(function (msg) {
				document.getElementById('course_id').innerHTML = msg;
            });
            
}


fetch_courses_by_course_type(<?php echo $request_info->course_type; ?>);
</script>	
 
 
 
 
 