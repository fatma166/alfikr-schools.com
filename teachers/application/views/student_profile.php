<?php $this->load->view('template/body'); ?>

<?php
	//var_dump($user);
?>

<style>
        .input_text{
            width: 300px;
            padding: 5px;
        
            
        }
        .input_text:focus{
            border: solid 1px #f1f1f1;
            border-bottom: solid 1px #000;
        }
        .info_table td{
            padding: 10px;
           
        }
</style>
<?php
    if($this->input->get('done') == 1){
?>
<br /><br /><br />
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   تم حفظ معلومات بنجاح
                  </div>
<?php
	}
    else if($this->input->get('done') == 'img_error'){
?>

<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   الرجاء تحميل صورة من لاحقة jpg أو png  أو jpeg
                  </div>
<?php
    } 
?>



            <script>
                  $(document).ready(function() {
                    $('#birthday').daterangepicker({
                      singleDatePicker: true,
                      calender_style: "picker_4"
                    }, function(start, end, label) {
                      console.log(start.toISOString(), end.toISOString(), label);
                    });
                  });
            </script>
            
            
            
             <div class="row">
              <div class="col-md-3 col-xs-12" >
                <div class="x_panel">
                  <div class="x_title">
                    <h2>الصورة الشخصية</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                                          <div class="dashboard-widget-content">
                        <img width="150" src="<?php if($student_info->picture){ echo base_url().'uploads/students_pictures/'.$student_info->picture; } else{ echo base_url()."images/default-user-image.png"; } ?>" />
                     
                      </div>
					  <br />
					  <form action="<?php echo base_url(); ?>master/change_student_picture" method="post"  enctype="multipart/form-data">
					  <label for="file-upload" class="custom-file-upload">
							تغيير الصورة
						</label>
						<input id="file-upload" type="file" name="photo" onchange="this.form.submit();"/>
						<style>
						input[type="file"] {
							display: none;
						}
/*						Then all you need to do is style the custom label element. (example).*/

						.custom-file-upload {
							border: 1px solid #ccc;
							display: inline-block;
							padding: 6px 12px;
							cursor: pointer;
						}
						</style>
						<input type="hidden" name="id" value="<?php echo $student_info->id; ?>" />
					</form>
                  </div>
                </div>

                

                


              </div>

              <div class="col-md-9 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>المعلومات الشخصية</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="<?php echo base_url(); ?>master/edit_student_info_done" class="form-horizontal form-label-left">
                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                    <input type="text" value="<?php echo $student_info->first_name; ?>" name="first_name" class=" form-control" placeholder="الاسم الأول " />
                                      
                                  </div>
            
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <input type="text"   value="<?php echo $student_info->last_name; ?>" name="last_name" class=" form-control" placeholder="الكنية" />
                                   
                                  </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <input type="text" value="<?php echo $student_info->father_name; ?>" name="father_name" class=" form-control" placeholder="اسم الأب" />
                                   </div>
                                  
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <input type="text"  value="<?php echo $student_info->mother_name; ?>" name="mother_name" class=" form-control" placeholder="اسم الأم" />
                                   
                                  </div>
                                  
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                     <select name="gender" class="form-control">
                                          <option value="0">الجنس</option>
                                          <option value="1" <?php if($student_info->gender == 1){ ?> selected <?php  } ?>>ذكر</option>
                                          <option value="2" <?php if($student_info->gender == 2){ ?> selected <?php  } ?>>أنثى</option>
                                          =>
                                    
                                      </select>  
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                     <select name="scoial_stat" class="form-control">
                                          <option value="0">الحالة الاجتماعية</option>
                                          <option value="1" <?php if($student_info->scoial_stat == 1){ ?> selected <?php  } ?>>أعزب</option>
                                          <option value="2" <?php if($student_info->scoial_stat == 2){ ?> selected <?php  } ?>>متزوج</option>
                                          <option value="3" <?php if($student_info->scoial_stat == 3){ ?> selected <?php  } ?>>مطلق</option>
                                          <option value="4" <?php if($student_info->scoial_stat == 4){ ?> selected <?php  } ?>>أرمل</option>
                                    
                                      </select>  
                                  </div>
                                  
                                  
                                  
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                       <input type="text" name="birthday"   value="<?php echo $student_info->birthday; ?>" placeholder="تاريخ الميلاد" class="date-picker form-control" id="birthday" /> </div>
                                  
                                  
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <select name="nationality" class="form-control">
										<option value="0">الجنسية</option>
										<?php
											
											foreach($countries as $row){
												if($student_info->nationality == $row->id){
													echo "<option value='$row->id' selected>$row->country_name</option>";
												}
												else{
													echo "<option value='$row->id'>$row->country_name</option>";
												}
													
											}
										?>
									</select>
                                   
                                  </div>
                                  
                                  
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <input type="text" name="birth_place"   value="<?php echo $student_info->birth_place; ?>" class="form-control" placeholder="مكان الولادة" />
                                   
                                  </div>
                                  
                                  
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                       <input type="text" name="kimlik_no"   value="<?php echo $student_info->kimlik_no; ?>" class="form-control" placeholder="رقم الكيملك في حال وجودها" />
                                   
                                  </div>
                                  
                                   <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                           <input type="text" name="ID_no" class="form-control"   value="<?php echo $student_info->ID_no; ?>"  placeholder="الرقم الوطني"  />
                                 
                                   
                                  </div>
                                  
                                   <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                           <input type="text" name="gmail" class="form-control"   value="<?php echo $student_info->gmail; ?>"  placeholder="بريد الجيميل"  />
                                 
                                   
                                  </div>
                                   
                                  
                                   <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                       <input type="submit" value="حفظ" name="btn" class="btn btn-success" />
                                  </div>
                                     <input type="hidden" name="user_id" value="<?php echo $student_info->id; ?>" />
                                  </form>
                    
                  </div>
                </div>
              </div>
              
              
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>الدورات</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php foreach($student_courses as $c){ ?>
                        <div style="background-color: #f1f1f1; padding: 10px; border: solid 1px #ccc;"><h2><?php echo $c->name; ?> | المبلغ المتبقي
                        <?php 
                            $payments = $c->payments;
                            $total = 0;
                            foreach($payments as $p){
                                $total += $p->amount;
                                
                            }
                            
                            echo $c->course_cost - $total;
                        ?>
                        </h2>
                        <table class="table">
                            <?php foreach($c->payments as $p){ ?>
                            <tr>
                                <td><?php echo $p->amount; ?></td>
                                <td><?php echo $p->date; ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    
                        </div>
                    <?php } ?>
                    
                  </div>
                </div>
              </div>



             
            </div>

           <?php $this->load->view('template/footer'); ?>
