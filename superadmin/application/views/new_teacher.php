

<?php $this->load->view('template/head'); ?>


<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>إضافة مدرس</h2>
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
          <form method="post" action="<?php echo base_url(); ?>master/add_teacher" enctype="multipart/form-data" class="form__details w-100 mt-1">
            <div class="row">
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> الاسم الكامل </label>
                  <input
                    type="text"
                    name="full_name"
                    class="form-control"
                    placeholder="الاسم الكامل"
                  />
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="input_form">
                  <label for=""> الموبايل</label>
                  <input
                    type="text"
                    name="mobile"
                    class="form-control"
                    placeholder="الموبايل"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="input_form">
                  <label for=""> البريد الألكتروني</label>
                  <input
                    type="text"
                    name="email"
                    class="form-control"
                    placeholder="البريد الألكتروني"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="input_form">
                  <label for=""> كلمة السر</label>
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="كلمة السر"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="input_form">
                  <label for=""> المادة </label>
                  <select
                    name="main_subject_id"
                    id="gender"
                    class="form-select form-control"
                  >
                    <?php foreach($main_subjects as $m){ ?>
								<option value="<?php echo $m->id; ?>"><?php echo $m->name; ?></otpion>
								<?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <label for="" class="mb-2"> الصورة الشخصية </label>
                <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                        style="gap: 8px">
                    <input class="form-control" type="file" name="img" id="formFile">
                    <img src="../../assets/images/down.svg" alt="download" alt="download"
                            loading="lazy" width="40" height="40"/>
                    <span> اضغط او قم بالسحب </span>
                    <p>png, jpg, jpeg (max. 800x400px)</p>
                </div>
              </div>
              
              
              <div class="col-md-12">
                <div class="input_form">
                  <label for=""> الوصف </label>
                  <textarea class="form-control" name="about" id="" cols="10" rows="10"></textarea>
                </div>
              </div>
            </div>
            <div class="btn__save">
                        <button>حفظ</button>
                      </div>
          </form>
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
