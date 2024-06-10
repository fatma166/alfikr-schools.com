<?php $this->load->view('template/body'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel"> 
        <div class="x_content">
            <div class="dashboard-widget-content">
				<h3>لائحة الطلاب / إضافة تعليق للطلاب / 
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
                <form method="post" action="<?php echo base_url(); ?>master/add_comment/<?php echo $student[0]->id; ?>"  enctype="multipart/form-data">
                    <table class='table table-striped '>
	                    <tr>
		                    <td style="width: 200px;">التعليق</td>
		                    <td>
                                <textarea class="form-control" name="message" rows="8" id="message" placeholder="إضافة تعليق" required></textarea>
                            </td>
	                    </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-success" value="إضافة"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>