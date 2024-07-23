<div class="tab-pane fade" id="pills-exams" role="tabpanel" aria-labelledby="pills-exams-tab" tabindex="0">
                    <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
                        <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for=""> المادة </label>
                            <select
                              name="schools"
                              id="schools"
                              class="form-select form-control"
                            >
                              <option selected disabled>المدارس</option>
                              <option value="">مادة 1</option>
                              <option value="">مادة 2</option>
                              <option value="">مادة 3</option>
                              <option value="">مادة 4</option>
                            </select>
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
                      <table id="examsTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>العنوان</th>
                            <th>النوع</th>
                            <th>تاريخ البدء</th>
                            <th>تاريخ الأنتهاء</th>
                            <th>الدرجة</th>
                            <th>المجموع الكلي</th>
                            <th>الحالة</th>
                            <th>المرحلة الدراسية</th>
                            <th>المادة</th>
                            <th>الفصل الدراسي</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>عنوان</td>
                            <td>نوع</td>
                            <td>27-11-2020</td>
                            <td>12-6-2020</td>
                            <td>95</td>
                            <td>95</td>
                            <td> 
                                <span class="status active"> ناجح </span>
                            </td>                            
                            <td>مرحلة 1</td>
                            <td>مادة 1</td>
                            <td>2الفصل الدراسي 1</td>
                          </tr>
                          <tr>
                            <td>عنوان</td>
                            <td>نوع</td>
                            <td>27-11-2020</td>
                            <td>12-6-2020</td>
                            <td>95</td>
                            <td>95</td>
                            <td> 
                                <span class="status stopped"> راسب </span>
                            </td>  
                            <td>مرحلة 1</td>
                            <td>مادة 1</td>
                            <td>2الفصل الدراسي 1</td>
                          </tr>
                        </tbody>
                      </table>
                </div>