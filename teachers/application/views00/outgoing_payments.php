

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




<div class="tab">
   <button class="tablinks" onclick="openCity(event, 'course_content')">أنواع الدفعات</button>
  <button class="tablinks" onclick="openCity(event, 'lessons')">الدفعات</button>
  

  <?php /*<button class="tablinks" onclick="openCity(event, 'add_homework')">إضافة وظيفة</button>
  <button class="tablinks" onclick="openCity(event, 'reports')">التقارير</button>*/?>
</div>

<div id="course_content" class="tabcontent <?php if($this->input->get('view_type') == 'payments_for_type' || !$this->input->get('view_type')){ ?> active <?php } ?>">
  
  
  <fieldset>
      <legend>إضافة نوع جديد</legend>
       <form method="post" action="<?php echo base_url(); ?>master/new_payment_for_type">
           <input type="text" name="name" /><input type="submit" class="btn btn-success" value="إضافة" />
        </form>
  </fieldset>
  
  <table class="table">
      
      <tr>
          <td>اسم الدفعة</td>
          <td>تعديل</td>
      </tr>
      <?php foreach($payments_for_types as $p){ ?>
      <form method="post" action="<?php echo base_url(); ?>master/edit_payment_for_type">
      <tr>
          <td><input type="text" name="name" value="<?php echo $p->name; ; ?>" /><input type="hidden" name="id" value="<?php echo $p->id; ?>" /></td>
          <td><input type="submit" class="btn btn-success" value="تعديل" /></td>
      </tr>
      </form>
      <?php } ?>
  </table>
  
  
  
  
</div>

<div id="lessons" class="tabcontent <?php if($this->input->get('view_type') == 'outgoing_payments'){ ?> active <?php } ?>">
  <input type="button" class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>master/new_outgoing_payment'" value="دفعة جديدة" />
  <hr/>
  <form method="get" action="<?php echo base_url(); ?>master/outgoing_payments">
  الفلاتر: 
  <select name="payment_for_id">
      <option value="0">جميع الدفعات</option>
      <?php foreach($payments_for_types as $p){ ?>
      <option <?php if($this->input->get('payment_for_id') == $p->id){ ?>selected<?php } ?> value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
      <?php } ?>
  </select>
  
  
  
  
  <input type="hidden" name="view_type" value="outgoing_payments" />
  <input type="hidden" name="filter_avtive" value="1" />
  <input type="submit" class="btn btn-success" value="عرض"  />
  <?php if($this->input->get('filter_avtive') == 1){ ?>
  <a href="<?php echo base_url(); ?>master/outgoing_payments/?view_type=outgoing_payments" class="btn btn-danger">إلغاء الفلاتر</a>
  <?php } ?>
  </form>
  <hr/>
  <?php $total_amount = 0; ?>
  <table class="table">
      <tr><td colspan="5" id="total_amount"></td></tr>
      <tr>
          <td>اسم الدفعة</td>
          <td>المبلغ</td>
          <td>التاريخ</td>
          <td>تعديل</td>
          <td>حذف</td>
      </tr>
      <?php foreach($payments as $p){ ?>
      <?php $total_amount += $p->amount; ?>
      <tr>
          <td><?php echo $p->payment_for; ?></td>
          <td><?php echo $p->amount; ?></td>
          <td><?php echo $p->date; ?></td>
          <td><a href="<?php echo base_url(); ?>master/edit_outgoing_payment/<?php echo $p->id; ?>">تعديل</a></td>
          <td><a href="<?php echo base_url(); ?>master/delete/outgoing_payments/<?php echo $p->id; ?>">حذف</a></td>
      </tr>
      <?php } ?>
  </table>
</div>

<script>
    document.getElementById("total_amount").innerHTML = "المجموع الكلي "+ <?php echo $total_amount; ?>;
</script>

<?php if($this->input->get('view_type') == 'outgoing_payments'){ ?>
<script>
document.getElementById("lessons").style.display = "block";
</script>
<?php } else{  ?>
<script>
document.getElementById("course_content").style.display = "block";
</script>
<?php } ?>
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




