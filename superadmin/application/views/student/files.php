<div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab" tabindex="0">
                    <button href="" class="add_file_btn">
                      <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        color="#fff"
                        fill="#fff"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M12 5V19M5 12H19"
                          color="#fff"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                      <span> إضافة ملف </span>
                    </button>
                    <form method="post" action="<?php echo base_url(); ?>master/add_student_file" enctype="multipart/form-data" class="add_file">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> اسم الملف </label>
                                    <input type="text" name="name" class="form-control" placeholder="اسم الملف ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form w-100">
                                    <label for=""> صورة الملف </label>
                                    <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4 w-100"
                                            style="gap: 8px">
                                        <input name="img" class="form-control" type="file" id="formFile">
                                        <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                                loading="lazy" width="40" height="40"/>
                                        <span> اضغط او قم بالسحب </span>
                                        <p>png, jpg, jpeg (max. 800x400px)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn__save btn__save__file justify-content-start align-items-start">
                            <button type="submit">حفظ</button>
                        </div>
						<input type="hidden" name="student_id" value="<?php echo $student_info->id; ?>" />
                    </form>
                    <table id="filesTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>اسم الملف</th>
                            <th>عرض</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($files as $p){ ?>
							<tr>
								<td><?php echo $p->name; ?></td>
								<td><a href="<?php echo base_url(); ?>../<?php echo $p->file; ?>" target="_blank">عرض</a></td>
							</tr>
							<?php  } ?>
                        </tbody>
                      </table>
                </div>