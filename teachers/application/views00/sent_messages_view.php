<?php $this->load->view('template/body'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel"> 
        <div class="x_content">
            <div class="dashboard-widget-content">
				<h3>صندوق البريد / الرسائل المرسلة 
                    <?php echo $student[0]->first_name. " " .$student[0]->last_name; ?>
                </h3>
			</div>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel"> 
        <div class="x_content">
            <div class="dashboard-widget-content">
                <table class='table table-striped table-bordered'  id="datatable">
                    <thead>
                        <tr>
                            <th style="text-align: right">اسم الطالب</th>
                            <th style="text-align: right">صورة الطالب</th>
                            <th style="text-align: right">تاريخ الإرسال</th>
                            <th style="text-align: right">الرسالة</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($messages as $m){
                                    if($m->from_t_to_s == '0'){
                            ?>
                            <tr>
                                <td>
                                    <?php foreach($students as $s){
                                        if($s->id == $m->student_id){
                                        echo $s->first_name. " " .$s->last_name;
                                    }} ?>
                                </td>
                                <td style="text-align: center">
                                    <?php foreach($students as $s){
                                            if($s->id == $m->student_id){
                                                if($s->picture){ ?>
                                                    <img width="50" src="<?php echo base_url().'../uploads/'.$s->picture; ?>"  />
                                                <?php } else { ?>
                                                    <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                    <?php }}}?>
                                </td>
                                <td><?php echo $m->date; ?></td>		
                                <td><?php echo $m->message; ?></td>
                            </tr>
                            <?php }} ?>
                        </tbody>	
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('template/footer'); ?>