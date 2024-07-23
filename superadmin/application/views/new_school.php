<?php $this->load->view('template/head'); ?>

<?php if($this->input->get('msg') == 'email_or_username_exist'){ ?>
<p style="color: red">
    
    عذراً البريد الالكتروني أو اسم المستخدم موجودين سابقاً .. الرجاء إدخال معلومات أخرى
</p>


<?php } ?>
 <div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2> إضافة مدرسة </h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  إضافة مدرسة
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
                    <form action="<?php echo base_url(); ?>master/new_school_done"  enctype="multipart/form-data" method="post" class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم المدرسة </label>
                                    <input type="text"  name="name" class="form-control" required placeholder="اسم المدرسة">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> البريد الألكتروني </label>
                                    <input type="email" style="text-align: right;"  name="email" class="form-control" required placeholder="البريد الألكتروني">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم المستخدم </label>
                                    <input type="text"  name="username" class="form-control" required placeholder="اسم المستخدم">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> كلمة السر </label>
                                    <input type="password"  name="password" class="form-control" required placeholder="كلمة السر">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> المدينة </label>
                                    <select name="city_id" style="width: 100%;"  onchange="fetch_regions(this.value);">
					<?php foreach($cities as $c){ ?>
					
					<option value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
					<?php } ?>
				
				</select>                           
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> المنطقة </label>
                                    <select name="region_id" id="regions_area" required style="width: 100%;">
				
				
				</select>
                          
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> نوع المدرسة </label>
                                    <select
                                    name="school_type"
                                    id="gender"
                                    class="form-select form-control" required
                                >
                                 
                                    <option value="KG1">KG1</option>
					<option value="KG2">KG2</option>
					<option value="مرحلة أساس">مرحلة أساس</option>
					<option value="مرحلة ثانوية">مرحلة ثانوية</option>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم مدير المدرسة </label>
                                    <input type="text" class="form-control" required name="moderator_name" placeholder="اسم مدير المدرسة">
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

 
 <?php $this->load->view('template/footer'); ?>
