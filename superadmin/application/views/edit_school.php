<?php $this->load->view('template/head'); ?>


 <div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2> تعديل مدرسة </h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  تعديل مدرسة
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
                    <form action="<?php echo base_url(); ?>master/edit_school_done"  enctype="multipart/form-data" method="post" class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم المدرسة </label>
                                    <input type="text"  name="name" value="<?php echo $school->name; ?>" class="form-control" placeholder="اسم المدرسة">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> البريد الألكتروني </label>
                                    <input type="text"  name="email" value="<?php echo $school->email; ?>" class="form-control" placeholder="البريد الألكتروني">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم المستخدم </label> 
                                    <input type="text"  name="username" value="<?php echo $school->username; ?>" class="form-control" placeholder="اسم المستخدم">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> كلمة السر </label>
                                    <input type="password"  name="password" value="<?php echo $school->password; ?>" class="form-control" placeholder="كلمة السر">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> المدينة </label>
                                    <select name="city_id" style="width: 100%;" onchange="fetch_regions(this.value);">
					<?php foreach($cities as $c){ ?>
					
					<option value="<?php echo $c->id; ?>" <?php if($c->id == $school->id){ ?>selected<?php } ?>><?php echo $c->ar_name; ?></option>
					<?php } ?>
				
				</select>                           
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> المنطقة </label>
                                    <select name="region_id" id="regions_area" style="width: 100%;" >
				
				
				</select>
                          
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> نوع المدرسة </label>
                                    <select
                                    name="school_type"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                  
                                    <option <?php if($school->school_type == 'KG1'){ ?>selected<?php } ?> value="KG1">KG1</option>
					<option <?php if($school->school_type == 'KG2'){ ?>selected<?php } ?>  value="KG2">KG2</option>
					<option <?php if($school->school_type == 'مرحلة أساس'){ ?>selected<?php } ?>  value="مرحلة أساس">مرحلة أساس</option>
					<option <?php if($school->school_type == 'مرحلة ثانوية'){ ?>selected<?php } ?>  value="مرحلة ثانوية">مرحلة ثانوية</option>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم مدير المدرسة </label>
                                    <input type="text" value="<?php echo $school->moderator_name; ?>" class="form-control" name="moderator_name" placeholder="اسم مدير المدرسة">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الحالة </label>
                                    <select
                                    name="status"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                
                                    <option value="1" <?php if($school->status == 1){ ?>selected<?php } ?>>نشط</option>
					<option value="0" <?php if($school->status == 0){ ?>selected<?php } ?>>غير نشط</option>
			
                                </select>                            
                                </div>
                            </div>
                        </div>
                        <div class="btn__save">
                            <button>حفظ</button>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $school->id; ?>" />
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
