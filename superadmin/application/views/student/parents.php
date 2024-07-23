<div class="tab-pane fade" id="pills-parents" role="tabpanel" aria-labelledby="pills-parents-tab" tabindex="0">
                    <form method="post" action="<?php echo base_url(); ?>master/edit_student_parents_done" class="">
                        <h2> البيانات الشخصية </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم الأب </label>
                                    <input type="text"  name="father_name" class="form-control"    value="<?php echo $student_info->father_name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم الأم </label>
                                    <input type="text" name="mother_name" class="form-control"    value="<?php echo $student_info->mother_name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> رقم هاتف المنزل </label>
                                    <input type="text" name="home_phone_number" class="form-control"    value="<?php echo $student_info->home_phone_number; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> رقم جوال الأب </label>
                                    <input type="text" name="father_mobile" class="form-control"    value="<?php echo $student_info->father_mobile; ?>">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> رقم جوال الأم </label>
                                    <input type="text" name="mother_mobile" class="form-control"    value="<?php echo $student_info->mother_mobile; ?>">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> البريد الالكتروني للأب  </label>
                                    <input type="text" name="father_email" class="form-control"    value="<?php echo $student_info->father_email; ?>">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> البريد الالكتروني للأم  </label>
                                    <input type="text" name="mother_email" class="form-control"    value="<?php echo $student_info->mother_email; ?>">
                                </div>
                            </div>
                           
                           
                            
                        </div>
                        <div class="btn__save">
                            <button type="submit">حفظ</button>
                        </div>
						<input type="hidden" name="student_id" value="<?php echo $student_info->id; ?>" />
                    </form>
                </div>