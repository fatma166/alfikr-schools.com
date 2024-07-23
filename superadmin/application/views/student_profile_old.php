<?php $this->load->view('template/body'); ?>



<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: right;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

</style>
<script>
function change_ordering(table, id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_ordering",
                data: {'table': table, 'id': id, 'value':value}

            }).done(function (msg) {
                   alert("تم تغيير الترتيب");
            });
}
</script>





<div class="tab">
   <button class="tablinks"    <?php if($this->input->get('tab') == 'details' || !$this->input->get('tab')){ ?> active <?php } ?>      onclick="openCity(event, 'details')">البيانات الشخصية</button>
   <button class="tablinks" onclick="openCity(event, 'parents')">ولي الأمر</button>
     <button class="tablinks" onclick="openCity(event, 'courses_types')">المراحل الدراسية</button>
  <button class="tablinks <?php if($this->input->get('tab') == 'exams_and_homeworks'){ ?> active <?php } ?>" onclick="openCity(event, 'exams_and_homeworks')">الاختبارات والواجبات</button>
  <button class="tablinks" onclick="openCity(event, 'attendes')">الحضور</button>
  <button class="tablinks" onclick="openCity(event, 'activities')">الأنشطة والسلوك</button>
    <button class="tablinks" onclick="openCity(event, 'payments')">الدفعات</button>
      <button class="tablinks" onclick="openCity(event, 'punishments')">الجزاءات</button>
      <button class="tablinks" onclick="openCity(event, 'files')">الملفات</button>
  

</div>


<div id="details" class="tabcontent"  <?php if($this->input->get('tab') == 'details' || !$this->input->get('tab')){ ?> style="display: block;" <?php } ?> >
  <?php $this->load->view('student/details'); ?>
   
</div>
<div id="parents" class="tabcontent  <?php if($this->input->get('tab') == 'students' ){ ?> active <?php } ?>">
  <?php $this->load->view('student/parents'); ?>
   
</div>


<div id="courses_types" class="tabcontent "<?php if($this->input->get('tab') == 'subjects'){ ?> style="display: block;" <?php } ?> >
  <?php $this->load->view('student/courses_types'); ?>
  
</div>
<div id="exams_and_homeworks" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  
   <?php $this->load->view('student/exams_and_homeworks'); ?>
</div>
<div id="attendes" class="tabcontent ">
  <?php $this->load->view('student/attendes'); ?>
   
</div>
<div id="activities" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('student/activities'); ?>
   
</div>
<div id="payments" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('student/payments'); ?>
   
</div>
<div id="punishments" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('student/punishments'); ?>
   
</div>

<div id="files" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('student/files'); ?>
   
</div>





<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  
  
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}




</script>




    <?php $this->load->view('template/footer'); ?>
