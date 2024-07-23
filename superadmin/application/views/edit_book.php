<?php $this->load->view('template/body'); ?>

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


    
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="tabs__form w-100">
            <div class="form__details w-100">
                <form  action="<?php echo base_url(); ?>master/edit_book_done" method="post"  enctype="multipart/form-data">
                  <div class="row">
                    <h2>تعديل كتاب
                    </h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input_form mt-2">
                                <label for=""> اسم الكتاب </label>
                                <input type="text" name="name" class="form-control" value="<?php echo $book->name; ?>" required  >
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input_form">
                            <label for=""> المرحلة </label>
                            <select name="course_type_id" class="form-select form-control" onchange="fetch_subjects_by_course_type(this.value)">
				
				<?php foreach($courses_types as $c){ ?>
					<option value="<?php echo $c->id; ?>" <?php if($c->id == $book->course_type_id){ ?>selected<?php } ?>>
					<?php 
                        
                        echo $c->ar_name;
                      ?>    
					    
					    
					</option>
				<?php } ?>
			</select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="input_form">
                            <label for=""> المادة </label>
                            <select name="main_subject_id" id="subjects" class="form-control">
				<?php foreach($main_subjects as $s){ ?>
				<option value="<?php echo $s->id; ?>" <?php if($s->id == $book->main_subject_id){ ?>selected<?php } ?>><?php echo $s->name; ?></option>
				
				<?php } ?>
				
			</select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mb-2"> صورة الكتاب </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <img src="<?php echo base_url(); ?>../<?php echo $book->image; ?>" width="200" />
                                <input class="form-control" type="file" name="img" id="formFile">
                                <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <label for="" class="mb-2"> الكتاب </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                	<a href="<?php echo base_url(); ?>../<?php echo $book->link; ?>" target="_blank" >عرض</a>
                                <input class="form-control" type="file" name="link" id="formFile">
                                <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                          </div>
                      <div class="btn__save">
                        <button>حفظ</button>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $book->id; ?>" />
                </form>
            </div>
          </div>
      

		
		
		 <?php $this->load->view('template/footer'); ?>