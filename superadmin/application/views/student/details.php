<div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                    <form action="<?php echo base_url(); ?>master/edit_student_info_done" method="post"  enctype="multipart/form-data" class="">
                        <div class="row">
                            <h2> الصورة الشخصية </h2>
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <img src="<?php echo base_url().'../uploads/'.$student_info->picture; ?>" alt="" width="150" height="150">
                            </div>
                            <div class="col-md-6">
                                <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                        style="gap: 8px">
                                    <input name="picture" class="form-control" type="file" id="formFile">
                                    <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                            loading="lazy" width="40" height="40"/>
                                    <span> اضغط او قم بالسحب </span>
                                    <p>png, jpg, jpeg (max. 800x400px)</p>
                                </div>
                            </div>
                            <h2> البيانات الشخصية </h2>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الإسم الأول </label>
                                    <input type="text" class="form-control" value="<?php echo $student_info->first_name; ?>" name="first_name" placeholder="الإسم الأول">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الإسم الثاني </label>
                                    <input type="text"  value="<?php echo $student_info->last_name; ?>" name="last_name" class="form-control" placeholder="الإسم الثاني">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> إسم الأب </label>
                                    <input type="text"  value="<?php echo $student_info->father_name; ?>" name="father_name" class="form-control" placeholder="إسم الأب">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> إسم الأم </label>
                                    <input type="text"  value="<?php echo $student_info->mother_name; ?>" name="mother_name" class="form-control" placeholder="إسم الأم">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الجنس </label>
                                    <select
                                     name="gender" 
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <option selected disabled>الجنس</option>
                                    <option <?php if($student_info->gender == 1){ ?> selected <?php  } ?> value="1">ذكر</option>
                                    <option <?php if($student_info->gender == 2){ ?> selected <?php  } ?> value="2">أنثى</option>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الحالة الأجتماعية </label>
                                    <select
                                    name="scoial_state"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <option selected disabled>الحالة الأجتماعية</option>
                                    <option value="1" <?php if($student_info->scoial_stat == 1){ ?> selected <?php  } ?>>اعزب</option>
                                    <option  value="2" <?php if($student_info->scoial_stat == 2){ ?> selected <?php  } ?>>متزوج</option>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> تاريخ الميلاد </label>
                                    <input type="birthday"  value="<?php echo $student_info->birthday; ?>" class="form-control" placeholder="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الجنسية </label>
                                    <select
                                     name="nationality"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <option selected disabled>الجنسية</option>
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
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> مكان الولادة</label>
                                    <input type="text" name="birth_place"   value="<?php echo $student_info->birth_place; ?>" class="form-control" placeholder="مكان الولادة">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الرقم الوطني </label>
                                    <input type="text"  name="ID_no" class="form-control"   value="<?php echo $student_info->ID_no; ?>" class="form-control" placeholder="الرقم الوطني">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> البريد الألكتروني </label>
                                    <input type="gmail"  value="<?php echo $student_info->gmail; ?>"  placeholder="بريد الجيميل" class="form-control" >
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
                                    <option selected disabled>الحالة</option>
                                    <option value="1" <?php  if($student_info->status == 1){ ?> selected <?php  } ?>>نشط</option>
                                    <option value="2" <?php  if($student_info->status == 2){ ?> selected <?php  } ?>>موقوف</option>
                                    <option value="3" <?php  if($student_info->status == 3){ ?> selected <?php  } ?>>مفصول</option>
                                    <option value="4" <?php  if($student_info->status == 4){ ?> selected <?php  } ?>>لم يسدد</option>
                                </select>                            
                                </div>
                            </div>
                        </div>
                        <div class="btn__save">
                            <button type="submit">حفظ</button>
                        </div>
						<input type="hidden" name="user_id" value="<?php echo $student_info->id; ?>" />
                    </form>
                </div>