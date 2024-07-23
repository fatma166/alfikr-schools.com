<div class="tab-pane fade" id="pills-audience" role="tabpanel" aria-labelledby="pills-audience-tab" tabindex="0">
                    <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
                        <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for=""> تاريخ البدء </label>
                            <input type="date" class="form-control">
                          </div>
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for=""> تاريخ الأنتهاء </label>
                            <input type="date" class="form-control">
                          </div>
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for=""> المراحل الدراسية </label>
                            <select
                              name="class"
                              id="class"
                              class="form-select form-control"
                              aria-label="Default select example"
                              aria-placeholder="Segmentation*"
                            >
                              <option selected disabled>المراحل الدراسية</option>
                              <option value="">مرحلة 1</option>
                              <option value="">مرحلة 2</option>
                              <option value="">مرحلة 3</option>
                              <option value="">مرحلة 4</option>
                            </select>
                          </div>
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for=""> الفصول الدراسية </label>
                            <select
                              name="class"
                              id="class"
                              class="form-select form-control"
                            >
                              <option selected disabled>الفصول الدراسية</option>
                              <option value="test">فصل 1</option>
                              <option value="">فصل 2</option>
                              <option value="">فصل 3</option>
                              <option value="">فصل 4</option>
                            </select>
                          </div>
                        </div>
                        <div class="filter_btn">
                          <button type="submit"> فلتر </button>
                        </div>
                      </form>
                      <table id="audienceTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th> اليوم </th>
                            <th>المرحلة الدراسية</th>
                            <th>المادة</th>
                            <th>الفصل الدراسي</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php foreach($attendes as $a){ ?>
							<tr>
								<td><?php echo $a->date; ?></td>
								<td><?php echo $a->course_type_name; ?></td>
								<td><?php echo $a->subject_name; ?></td>
								<td><?php echo $a->course_name; ?></td>
								
							</tr>
						<?php } ?>
                          <tr>
                            <td>27-11-2020</td>                         
                            <td>مرحلة 1</td>
                            <td>مادة 1</td>
                            <td>2الفصل الدراسي 1</td>
                          </tr>
                        </tbody>
                      </table>
                </div>