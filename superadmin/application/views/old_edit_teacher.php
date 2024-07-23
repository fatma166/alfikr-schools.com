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
  
   <button class="tablinks" onclick="openCity(event, 'attendes')">الحضور</button>
  <button class="tablinks" onclick="openCity(event, 'complaints')">الشكاوي</button>
    <button class="tablinks" onclick="openCity(event, 'payments')">الدفعات</button>
    
      <button class="tablinks" onclick="openCity(event, 'files')">الملفات</button>
  

</div>


<div id="details" class="tabcontent"  <?php if($this->input->get('tab') == 'details' || !$this->input->get('tab')){ ?> style="display: block;" <?php } ?> >
  <?php $this->load->view('teacher/details'); ?>
   
</div>

<div id="attendes" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('teacher/attendes'); ?>
   
</div>
<div id="complaints" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('teacher/compliants'); ?>
   
</div>
<div id="payments" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('teacher/payments'); ?>
   
</div>


<div id="files" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('teacher/files'); ?>
   
</div>

<div id="files" class="tabcontent "  <?php if($this->input->get('tab') == 'lessons' ){ ?> style="display: block;" <?php } ?>>
  <?php $this->load->view('teacher/files'); ?>
   
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
