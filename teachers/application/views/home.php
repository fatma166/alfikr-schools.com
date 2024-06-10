<?php $this->load->view('template/body'); ?>

<style>
.statistics__items .statistics_item {
	padding: 5px 25px;
    border-radius: 12px;
    width: 100%;
}
.statistics__items .statistics_item:nth-child(1) {
    background-color: #0052cc;
    border: 1px solid #0052cc;
}
.statistics__items .statistics_item:nth-child(2) {
    background-color: #ff9920;
    border: 1px solid #ff9920;
}
.statistics__items .statistics_item:nth-child(3) {
    background-color: #add8e6;
    border: 1px solid #add8e6;
}
.statistics__items .statistics_item:nth-child(4) {
    background-color: #04a08b;
    border: 1px solid #04a08b;
}
.statistics__items .statistics_item .statistics_info h6 {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
}
.statistics__items .statistics_item .statistics_info span {
    color: #fff;
    font-size: 15px;
    font-weight: 500;
}
.statistics__materials .dt-search, .statistics__materials .dt-length, .statistics__materials .dt-info, .statistics__materials .dt-paging {
    display: none !important;
}
</style>

<div class="statistics__items d-flex justify-content-between align-items-start flex-row gap-2 w-100">
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>المواد التعليمية</h6>
            <span> 1 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college class-bro.svg" alt="img" width="120" height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>الواجبات</h6>
            <span> 50 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college project-rafiki.svg" alt="img" width="120" height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>الأختبارات</h6>
            <span> 15 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college admission-amico.svg" alt="img" width="120" height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>الطلاب</h6>
            <span> 120 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college students-amico.svg" alt="img" width="120" height="120">
        </div>
    </div>
</div>

<div class="statistics__materials mt-4 w-100">
    <div class="row">
        <div class="col-md-6">
            <div class="w-100">
                <h2>المواد</h2>
                <div id="materialsTable_wrapper" class="dt-container dt-empty-footer">
                    <div id="" class="row">
                        <div id="" class="col-sm-12 col-md-6 length_">
                            <div class="dt-length"><select name="materialsTable_length" aria-controls="materialsTable"
                                    class="dt-input" id="dt-length-3">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="-1">All</option>
                                </select><label for="dt-length-3"></label></div>
                        </div>
                        <div id="" class="col-sm-12 col-md-6 search_">
                            <div class="dt-search"><input type="search" class="dt-input" id="dt-search-3"
                                    placeholder="بحث" aria-controls="materialsTable"><label for="dt-search-3"></label>
                            </div>
                        </div>
                    </div>
                    <div id="" class="row">
                        <div id="" class="col-sm-12 table_layout">
                            <table id="materialsTable" class="display dataTable" style="width: 100%;"
                                aria-describedby="materialsTable_info">
                                <colgroup>
                                    <col style="width: 382.281px;">
                                    <col style="width: 410.641px;">
                                </colgroup>
                                <thead>
                                    <tr role="row">
                                        <th data-dt-column="0" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                                            aria-sort="ascending" aria-label="المادة: Activate to invert sorting"
                                            tabindex="0"><span class="dt-column-title" role="button">المادة</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="1" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc"
                                            aria-label="الشعبة: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">الشعبة</span><span
                                                class="dt-column-order"></span></th>
                                    </tr>
                                </thead>
                                <tbody>







                                    <tr>
                                        <td class="sorting_1">مادة 1</td>
                                        <td>شعبة 1</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">مادة 2</td>
                                        <td>شعبة 3</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">مادة 3</td>
                                        <td>شعبة 3</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">مادة 4</td>
                                        <td>شعبة 4</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">مادة 5</td>
                                        <td>شعبة 5</td>
                                    </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                    <div id="" class="row">
                        <div id="" class="col-sm-12 col-md-5">
                            <div class="dt-info" aria-live="polite" id="materialsTable_info" role="status">Showing 1 to
                                5 of 7 entries</div>
                        </div>
                        <div id="" class="col-sm-12 col-md-7">
                            <div class="dt-paging paging_full_numbers" style=""><button
                                    class="dt-paging-button disabled first" role="link" type="button"
                                    aria-controls="materialsTable" aria-disabled="true" aria-label="First"
                                    data-dt-idx="first" tabindex="-1">الأول</button><button
                                    class="dt-paging-button disabled previous" role="link" type="button"
                                    aria-controls="materialsTable" aria-disabled="true" aria-label="Previous"
                                    data-dt-idx="previous" tabindex="-1">السابق</button><button
                                    class="dt-paging-button current" role="link" type="button"
                                    aria-controls="materialsTable" aria-current="page" data-dt-idx="0"
                                    tabindex="0">1</button><button class="dt-paging-button next" role="link"
                                    type="button" aria-controls="materialsTable" aria-label="Next" data-dt-idx="next"
                                    tabindex="0">التالي</button><button class="dt-paging-button last" role="link"
                                    type="button" aria-controls="materialsTable" aria-label="Last" data-dt-idx="last"
                                    tabindex="0">الأخير</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div style="height: 500px;width: 100%;" class="flex-end d-flex justify-content-end align-items-end">
                <canvas id="pieChart" style="height: 500px; display: block; box-sizing: border-box; width: 500px;"
                    width="500" height="500"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="statistics__materials mt-4 w-100">
    <div class="row">
        <div class="col-md-6">
            <div>
                <h2>اخر 10 رسائل</h2>
                <div id="messagesTable_wrapper" class="dt-container dt-empty-footer">
                    <div id="" class="row">
                        <div id="" class="col-sm-12 col-md-6 length_">
                            <div class="dt-length"><select name="messagesTable_length" aria-controls="messagesTable"
                                    class="dt-input" id="dt-length-5">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="-1">All</option>
                                </select><label for="dt-length-5"></label></div>
                        </div>
                        <div id="" class="col-sm-12 col-md-6 search_">
                            <div class="dt-search"><input type="search" class="dt-input" id="dt-search-5"
                                    placeholder="بحث" aria-controls="messagesTable"><label for="dt-search-5"></label>
                            </div>
                        </div>
                    </div>
                    <div id="" class="row">
                        <div id="" class="col-sm-12 table_layout">
                            <table id="messagesTable" class="display dataTable" aria-describedby="messagesTable_info"
                                style="width: 792.922px;">
                                <colgroup>
                                    <col style="width: 126.672px;">
                                    <col style="width: 666.25px;">
                                </colgroup>
                                <thead>
                                    <tr role="row">
                                        <th data-dt-column="0" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                                            aria-sort="ascending" aria-label="الطالب: Activate to invert sorting"
                                            tabindex="0"><span class="dt-column-title" role="button">الطالب</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="1" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc"
                                            aria-label="الرسالة: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">الرسالة</span><span
                                                class="dt-column-order"></span></th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <tr>
                                        <td class="sorting_1">طالب 1</td>
                                        <td>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">طالب 2</td>
                                        <td>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">طالب 3</td>
                                        <td>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                    <div id="" class="row">
                        <div id="" class="col-sm-12 col-md-5">
                            <div class="dt-info" aria-live="polite" id="messagesTable_info" role="status">Showing 1 to 3
                                of 3 entries</div>
                        </div>
                        <div id="" class="col-sm-12 col-md-7">
                            <div class="dt-paging paging_full_numbers" style=""><button
                                    class="dt-paging-button disabled first" role="link" type="button"
                                    aria-controls="messagesTable" aria-disabled="true" aria-label="First"
                                    data-dt-idx="first" tabindex="-1">الأول</button><button
                                    class="dt-paging-button disabled previous" role="link" type="button"
                                    aria-controls="messagesTable" aria-disabled="true" aria-label="Previous"
                                    data-dt-idx="previous" tabindex="-1">السابق</button><button
                                    class="dt-paging-button current" role="link" type="button"
                                    aria-controls="messagesTable" aria-current="page" data-dt-idx="0"
                                    tabindex="0">1</button><button class="dt-paging-button disabled next" role="link"
                                    type="button" aria-controls="messagesTable" aria-disabled="true" aria-label="Next"
                                    data-dt-idx="next" tabindex="-1">التالي</button><button
                                    class="dt-paging-button disabled last" role="link" type="button"
                                    aria-controls="messagesTable" aria-disabled="true" aria-label="Last"
                                    data-dt-idx="last" tabindex="-1">الأخير</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <h2>اخر 10 تعليقات</h2>
                <div id="commentsTable_wrapper" class="dt-container dt-empty-footer">
                    <div id="" class="row">
                        <div id="" class="col-sm-12 col-md-6 length_">
                            <div class="dt-length"><select name="commentsTable_length" aria-controls="commentsTable"
                                    class="dt-input" id="dt-length-1">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="-1">All</option>
                                </select><label for="dt-length-1"></label></div>
                        </div>
                        <div id="" class="col-sm-12 col-md-6 search_">
                            <div class="dt-search"><input type="search" class="dt-input" id="dt-search-1"
                                    placeholder="بحث" aria-controls="commentsTable"><label for="dt-search-1"></label>
                            </div>
                        </div>
                    </div>
                    <div id="" class="row">
                        <div id="" class="col-sm-12 table_layout">
                            <table id="commentsTable" class="display dataTable" aria-describedby="commentsTable_info"
                                style="width: 792.922px;">
                                <colgroup>
                                    <col style="width: 126.672px;">
                                    <col style="width: 666.25px;">
                                </colgroup>
                                <thead>
                                    <tr role="row">
                                        <th data-dt-column="0" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                                            aria-sort="ascending" aria-label="الطالب: Activate to invert sorting"
                                            tabindex="0"><span class="dt-column-title" role="button">الطالب</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="1" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc"
                                            aria-label="الشعبة: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">الشعبة</span><span
                                                class="dt-column-order"></span></th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <tr>
                                        <td class="sorting_1">طالب 1</td>
                                        <td>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">طالب 2</td>
                                        <td>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">طالب 3</td>
                                        <td>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على
                                            العميل
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                    <div id="" class="row">
                        <div id="" class="col-sm-12 col-md-5">
                            <div class="dt-info" aria-live="polite" id="commentsTable_info" role="status">Showing 1 to 3
                                of 3 entries</div>
                        </div>
                        <div id="" class="col-sm-12 col-md-7">
                            <div class="dt-paging paging_full_numbers" style=""><button
                                    class="dt-paging-button disabled first" role="link" type="button"
                                    aria-controls="commentsTable" aria-disabled="true" aria-label="First"
                                    data-dt-idx="first" tabindex="-1">الأول</button><button
                                    class="dt-paging-button disabled previous" role="link" type="button"
                                    aria-controls="commentsTable" aria-disabled="true" aria-label="Previous"
                                    data-dt-idx="previous" tabindex="-1">السابق</button><button
                                    class="dt-paging-button current" role="link" type="button"
                                    aria-controls="commentsTable" aria-current="page" data-dt-idx="0"
                                    tabindex="0">1</button><button class="dt-paging-button disabled next" role="link"
                                    type="button" aria-controls="commentsTable" aria-disabled="true" aria-label="Next"
                                    data-dt-idx="next" tabindex="-1">التالي</button><button
                                    class="dt-paging-button disabled last" role="link" type="button"
                                    aria-controls="commentsTable" aria-disabled="true" aria-label="Last"
                                    data-dt-idx="last" tabindex="-1">الأخير</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script>

        
var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['المواد', 'الشعب'],
                Height: 30,
                datasets: [{
                    label: 'عدد الطلاب',
                    data: [12, 19],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
      
</script>


<?php $this->load->view('template/footer'); ?>
