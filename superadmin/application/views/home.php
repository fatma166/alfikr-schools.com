<?php $this->load->view('template/body');?>


<style>
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

.statistics__items .statistics_item.seven {
    background-color: #28C76F;
    border: 1px solid #28C76F;
}

.statistics__items .statistics_item.five {
    background-color: #ff562f;
    border: 1px solid #ff562f;
}

.statistics__items .statistics_item.six {
    background-color: #331b64;
    border: 1px solid #331b64;
}

.statistics__items .statistics_item.eight {
    background-color: #c79828;
    border: 1px solid #c79828;
}

.statistics__items .statistics_item.nine {
    background-color: #c72854;
    border: 1px solid #c72854;
}

.statistics__items .statistics_item {
    padding: 5px 25px;
    border-radius: 12px;
    width: 100%;
}

.statistics__items .statistics_item .statistics_info span {
    color: #fff;
    font-size: 15px;
    font-weight: 500;
}

.statistics__items .statistics_item .statistics_info h6 {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
}

.notifications__items {
    background-color: #fff;
    border: 1px solid #d3d3d3;
    border-radius: 12px;
}

.notifications__items h6 {
    background-color: #e6e6e6;
    border-radius: 12px 12px 0 0;
    width: 100%;
    padding: 10px;
    color: #050505;
    font-size: 15px;
    font-weight: 600;
}

.notifications__items .notification__item {
    padding: 12px;
    border-bottom: 1px solid #d3d3d3;
    width: 100%;
}

.notifications__items .notification__item p {
    font-size: 15px;
    font-weight: 600;
    color: #050505;
}

.notifications__items .notification__item span {
    color: #636363;
    font-size: 14px;
    font-weight: 400;
}
</style>

<div class="statistics__items d-flex justify-content-between align-items-start flex-row gap-2 w-100">
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد الدروس المرفوعة</h6>
            <span> <?php echo $nof_all_lessons[0]->nof_lessons; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college class-bro.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد مرات تنزيل الدروس</h6>
            <span> <?php echo $nof_all_schools[0]->nof_all_schools; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college project-rafiki.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>الإيرادات المالية</h6>
            <span> <?php echo $sum_payments[0]->amount; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college admission-amico.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
</div>

<div class="statistics__items d-flex justify-content-between align-items-start flex-row gap-2 w-100">
    <div class="statistics_item seven d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد المدارس</h6>
            <span> <?php echo $nof_all_schools[0]->nof_all_schools; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college students-amico.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
    <div class="statistics_item five d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد الطلاب</h6>
            <span> <?php echo $nof_all_students[0]->nof_all_students; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/Learning-bro.svg" alt="img" width="120" height="120">
        </div>
    </div>
    <div class="statistics_item six d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد المدرسين</h6>
            <span> <?php echo $nof_all_teachers[0]->nof_all_teachers; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/Learning-cuate.svg" alt="img" width="120" height="120">
        </div>
    </div>
    <div class="statistics_item six d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد الشعب الدراسية</h6>
            <span> <?php echo $nof_all_coruses[0]->nof_all_coruses; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/Learning-cuate.svg" alt="img" width="120" height="120">
        </div>
    </div>
</div>
<div class="statistics__items d-flex justify-content-between align-items-start flex-row gap-2 w-100">
    <div class="statistics_item eight d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد المحاضرات المباشرة</h6>
            <span> <?php echo $nof_live_classes[0]->nof_live_classes; ?> </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college class-bro.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
    <div class="statistics_item nine d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>عدد المحاضرات الكلي</h6>
            <span> <?php echo $nof_all_live_classes[0]->nof_all_live_classes; ?>  </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college project-rafiki.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
</div>
<div class="w-100 statistics__materials">
    <div class="row">
        <div class="col-md-6">
            <div
                class="notifications__items notification__item d-flex justify-content-start align-items-start flex-column w-100">
                <h6>أحدث النشاطات</h6>
                <div class="notification__item">
                    <p>تمت إضافة مدرس جديد</p>
                    <span>
                        مدرسة الفكر <br>
                        27-11-2020
                    </span>
                </div>
                <div class="notification__item">
                    <p>تمت إضافة مدرس جديد</p>
                    <span>
                        مدرسة الفكر <br>
                        27-11-2020
                    </span>
                </div>
                <div class="notification__item">
                    <p>تمت إضافة مدرس جديد</p>
                    <span>
                        مدرسة الفكر <br>
                        27-11-2020
                    </span>
                </div>
                <div class="notification__item">
                    <p>تمت إضافة مدرس جديد</p>
                    <span>
                        مدرسة الفكر <br>
                        27-11-2020
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <span class="chart_title">المدارس</span>
            <div id="example_wrapper" class="dt-container dt-empty-footer">
                <div id="" class="row">
                    <div id="" class="col-sm-12 table_layout">
                        <table id="example" class="display dataTable" style="width: 100%;"
                            aria-describedby="example_info">
                            <colgroup>
                                <col style="width: 421.406px;">
                                <col style="width: 371.516px;">
                            </colgroup>
                            <thead>
                                <tr role="row">
                                    <th data-dt-column="0" rowspan="1" colspan="1"
                                        class="dt-orderable-asc dt-orderable-desc dt-ordering-asc" aria-sort="ascending"
                                        aria-label="اسم المدرسة: Activate to invert sorting" tabindex="0"><span
                                            class="dt-column-title" role="button">اسم المدرسة</span><span
                                            class="dt-column-order"></span></th>
                                    <th data-dt-column="1" rowspan="1" colspan="1"
                                        class="dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                        aria-label="عدد الطلاب: Activate to sort" tabindex="0"><span
                                            class="dt-column-title" role="button">عدد الطلاب</span><span
                                            class="dt-column-order"></span></th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php foreach($all_schools as $s){ ?>
                                <tr>
                                    <td class="sorting_1"> <?php echo $s->name; ?> </td>
                                    <td class="dt-type-numeric"> <?php echo $s->nof_students; ?> </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row charts mt-5">
            <div class="col-md-4">
                <span class="chart_title">الصفوف الدراسية</span>
                <canvas id="pieChart" style="height: 505px; display: block; box-sizing: border-box; width: 505px;"
                    width="505" height="505"></canvas>
            </div>
            <div class="col-md-4">
                <span class="chart_title">المواد </span>
                <canvas id="pieChart2" style="height: 505px; display: block; box-sizing: border-box; width: 505px;"
                    width="505" height="505"></canvas>
            </div>
            <div class="col-md-4">
                <span class="chart_title">المعامل</span>
                <canvas id="pieChart3" style="height: 505px; display: block; box-sizing: border-box; width: 505px;"
                    width="505" height="505"></canvas>
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
        labels: ['الصف الأول', 'الصف الثاني'],
        Height: 30,
        datasets: [{
            label: 'الصفوف الدراسية',
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
<script>
var pieCtx = document.getElementById('pieChart2').getContext('2d');
var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['ذكور', 'إناث'],
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
<script>
var pieCtx = document.getElementById('pieChart3').getContext('2d');
var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['معمل 1', 'معمل 2'],
        Height: 30,
        datasets: [{
            label: 'المعامل',
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

<?php $this->load->view('template/footer');?>
