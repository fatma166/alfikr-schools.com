<?php $this->load->view('template/head'); ?>




<div class="tabs__form w-100">
              <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">البيانات الشخصية</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-parents-tab" data-bs-toggle="pill" data-bs-target="#pills-parents" type="button" role="tab" aria-controls="pills-parents" aria-selected="true">ولى الأمر</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-grade-tab" data-bs-toggle="pill" data-bs-target="#pills-grade" type="button" role="tab" aria-controls="pills-grade" aria-selected="true">المراحل الدراسية</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-exams-tab" data-bs-toggle="pill" data-bs-target="#pills-exams" type="button" role="tab" aria-controls="pills-exams" aria-selected="true">الأختبارات و الواجبات</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-audience-tab" data-bs-toggle="pill" data-bs-target="#pills-audience" type="button" role="tab" aria-controls="pills-audience" aria-selected="true">الحضور</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-activity-tab" data-bs-toggle="pill" data-bs-target="#pills-activity" type="button" role="tab" aria-controls="pills-activity" aria-selected="true">الأنشطة و السلوك</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-numbers-tab" data-bs-toggle="pill" data-bs-target="#pills-numbers" type="button" role="tab" aria-controls="pills-numbers" aria-selected="true">الدفعات</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-sanctions-tab" data-bs-toggle="pill" data-bs-target="#pills-sanctions" type="button" role="tab" aria-controls="pills-sanctions" aria-selected="true">الجزاءات</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-table-tab" data-bs-toggle="pill" data-bs-target="#pills-table" type="button" role="tab" aria-controls="pills-table" aria-selected="true">جدول الدوام</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-files-tab" data-bs-toggle="pill" data-bs-target="#pills-files" type="button" role="tab" aria-controls="pills-files" aria-selected="true">الملفات</button>
                </li>
              </ul>
			  <div class="tab-content form__details" id="pills-tabContent">
					<?php $this->load->view('student/details'); ?>
					<?php $this->load->view('student/parents'); ?>
					<?php $this->load->view('student/courses_types'); ?>
					<?php $this->load->view('student/exams_and_homeworks'); ?>
					<?php $this->load->view('student/attendes'); ?>
					<?php $this->load->view('student/activities'); ?>
					<?php $this->load->view('student/payments'); ?>
					<?php $this->load->view('student/punishments'); ?>
					<?php $this->load->view('student/time_table'); ?>
					<?php $this->load->view('student/files'); ?>
			  
			  </div>
	</div>






































<?php $this->load->view('template/footer'); ?>
