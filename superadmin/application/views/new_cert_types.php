<?php $this->load->view('template/head'); ?>



<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2> إضافة نموذج </h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  إضافة نموذج
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
                    <form method="post" action="<?php echo base_url(); ?>master/new_cert_type_done" class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم النموذج </label>
                                    <input type="text" name="name" class="form-control" placeholder="اسم النموذج">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> المرحلة </label>
                                    <select
                                    name="course_type"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <?php foreach($courses_types as $c){ ?>
                                    <option value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
                                    <?php } ?>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> نموذج لـ </label>
                                    <select
                                    name="for_who"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <option selected disabled>نموذج لـ</option>
                                    <option value="طالب">طالب</option>
                                    <option value="مدرس">مدرس</option>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-12">
                              <textarea id="editor1" name="content"></textarea>
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

 
 <?php $this->load->view('template/footer'); ?>
 
 <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
      $(document).ready(function() {
        CKEDITOR.replace('editor1');
      });
      </script>
