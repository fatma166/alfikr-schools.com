<?php $this->load->view('template/body'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel"> 
        <div class="x_content">
            <div class="dashboard-widget-content">
				<h3>صندوق البريد / لائحة الطلاب</h3>
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
                            <th style="text-align: right">lمراسلة الطالب</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($students as $s){
                            ?>
                            <tr>
                                <td><?php echo $s->first_name. " " .$s->last_name;?></td>
                                <td style="text-align: center">
                                    <?php if($s->picture){ ?>
                                        <img width="50" src="<?php echo base_url().'../uploads/'.$s->picture; ?>"  />
                                            <?php } else { ?>
                                                <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                            <?php  }?>
                                </td>		
                                <td>
                                    <a href="<?php echo base_url(); ?>master/send_message_for_student_page/<?php echo $s->id; ?>" class="btn btn-success">مراسلة الطالب</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>	
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('template/footer'); ?>