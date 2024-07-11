<?php $this->load->view('template/body');?>

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
.statistics__items .statistics_item.five {
    background-color: #ff562f;
    border: 1px solid #ff562f;
}
.statistics__items .statistics_item.six {
    background-color: #331b64;
    border: 1px solid #331b64;
}
.notifications__items {
    background-color: #fff;
    border: 1px solid #d3d3d3;
    border-radius: 12px;
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
.notifications__items h6 {
    background-color: #e6e6e6;
    border-radius: 12px 12px 0 0;
    width: 100%;
    padding: 10px;
    color: #050505;
    font-size: 15px;
    font-weight: 600;
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
</style>
<div class="statistics__items d-flex justify-content-between align-items-start flex-row gap-2 w-100">
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6> الواجبات اليوم</h6>
            <span> 1 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college class-bro.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>الأختبارات</h6>
            <span> 50 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college project-rafiki.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>المواد المساعدة</h6>
            <span> 15 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college admission-amico.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
    <div class="statistics_item d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>المواد</h6>
            <span> 120 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/college students-amico.svg" alt="img" width="120"
                height="120">
        </div>
    </div>
</div>

<div class="statistics__items d-flex justify-content-between align-items-start flex-row gap-2 w-100">
    <div class="statistics_item five d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>الدروس التفاعلية</h6>
            <span> 120 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/Learning-bro.svg" alt="img" width="120" height="120">
        </div>
    </div>
    <div class="statistics_item six d-flex justify-content-between align-items-center flex-row gap-2">
        <div class="statistics_info">
            <h6>الرسائل</h6>
            <span> 120 </span>
        </div>
        <div>
            <img src="<?php echo base_url(); ?>../assets/images/Learning-cuate.svg" alt="img" width="120" height="120">
        </div>
    </div>
</div>

<div class="w-100">
    <div class="row">
        <div class="col-md-4">
            <div
                class="notifications__items notification__item d-flex justify-content-start align-items-start flex-column w-100">
                <h6>الأشعارات</h6>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div
                class="notifications__items notification__item d-flex justify-content-start align-items-start flex-column w-100">
                <h6>الرسائل</h6>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
                <div class="notification__item">
                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض </p>
                    <span>27-11-2020</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="date" class="hasDatepicker">
                <div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"
                    style="display: block;">
                    <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a
                            class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click"
                            title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a
                            class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click"
                            title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a>
                        <div class="ui-datepicker-title"><select class="ui-datepicker-month" data-handler="selectMonth"
                                data-event="change">
                                <option value="0">Jan</option>
                                <option value="1">Feb</option>
                                <option value="2" selected="selected">Mar</option>
                                <option value="3">Apr</option>
                                <option value="4">May</option>
                                <option value="5">Jun</option>
                                <option value="6">Jul</option>
                                <option value="7">Aug</option>
                                <option value="8">Sep</option>
                                <option value="9">Oct</option>
                                <option value="10">Nov</option>
                                <option value="11">Dec</option>
                            </select><select class="ui-datepicker-year" data-handler="selectYear" data-event="change">
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024" selected="selected">2024</option>
                                <option value="2025">2025</option>
                            </select></div>
                    </div>
                    <table class="ui-datepicker-calendar">
                        <thead>
                            <tr>
                                <th scope="col" class="ui-datepicker-week-end"><span title="Sunday">Su</span></th>
                                <th scope="col"><span title="Monday">Mo</span></th>
                                <th scope="col"><span title="Tuesday">Tu</span></th>
                                <th scope="col"><span title="Wednesday">We</span></th>
                                <th scope="col"><span title="Thursday">Th</span></th>
                                <th scope="col"><span title="Friday">Fr</span></th>
                                <th scope="col" class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td
                                    class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">1</a></td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">2</a></td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">3</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">4</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">5</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">6</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">7</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">8</a></td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">9</a></td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">10</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">11</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">12</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">13</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">14</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">15</a></td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">16</a></td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">17</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">18</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">19</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">20</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">21</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">22</a></td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">23</a></td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">24</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">25</a></td>
                                <td class=" ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today"
                                    data-handler="selectDay" data-event="click" data-month="2" data-year="2024"><a
                                        class="ui-state-default ui-state-highlight ui-state-active" href="#">26</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">27</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">28</a></td>
                                <td class=" " data-handler="selectDay" data-event="click" data-month="2"
                                    data-year="2024"><a class="ui-state-default" href="#">29</a></td>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">30</a></td>
                            </tr>
                            <tr>
                                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click"
                                    data-month="2" data-year="2024"><a class="ui-state-default" href="#">31</a></td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                                <td
                                    class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">
                                    &nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row charts mt-5">
            <div class="col-md-6">
                <span class="chart_title">المواد</span>
                <canvas id="materialsChart" style="height: 385px; display: block; box-sizing: border-box; width: 770px;"
                    width="770" height="385"></canvas>
            </div>
            <div class="col-md-6">
                <span class="chart_title">المواد التفاعلية</span>
                <canvas id="materialsHlepersChart"
                    style="height: 385px; display: block; box-sizing: border-box; width: 770px;" width="770"
                    height="385"></canvas>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>
