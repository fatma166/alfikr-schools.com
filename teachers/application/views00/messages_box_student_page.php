<?php $this->load->view('template/body'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel"> 
        <div class="x_content">
            <div class="dashboard-widget-content">
				<h3>صندوق البريد / لائحة الطلاب / مراسلة 
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
                <form method="post" action="<?php echo base_url(); ?>master/send_message_for_student/<?php echo $student[0]->id; ?>"  enctype="multipart/form-data">
                    <table class='table table-striped '>
	                    <tr>
		                    <td style="width: 200px;">الرسالة</td>
		                    <td>
                                <textarea class="form-control" name="message" rows="8" id="message" placeholder="محتوى الرسالة" required></textarea>
                            </td>
	                    </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-success" value="إرسال"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>