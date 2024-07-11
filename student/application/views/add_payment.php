<?php $this->load->view('template/body'); ?>

<style>
	.payment_table td{
		padding: 5px;
	}
</style>

<?php
    if($this->input->get('msg') == 'done'){
?>
<br /><br /><br />
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   تم إضافة الوصل بنجاح .. سيتم الموافقة عليه خلال 24 ساعة 
                  </div>
<?php
	}
?>
<div class="col-md-12 col-sm-6 col-xs-12" width="100%">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>إضافة دفعة جديدة</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php 
                        
						if(count($courses) > 0){
						   
				    ?>
				  <form action="<?php echo base_url(); ?>finance/add_payment_done" method="post"  enctype="multipart/form-data">
					<table class="payment_table"><tr>
						<td>اسم الدورة</td>
						<td>
							<select name="course_id">
								<?php
									
									foreach($courses as $row){
										
										echo "<option value='$row->id'>$row->title</option>";
										
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							صورة الوصل
						</td>
						<td><input type="file" name="wasel" /></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" value="إضافة" class="btn btn-success" />
						</td>
					</tr>
				</table>
                    </form>
                    <?php
						}
						else{
						    echo 'يرجى التسجيل في أحد الدورات أولاً';
						}
					?>
					
					
                  </div>
                </div>
              </div>
			  
			  
<?php $this->load->view('template/footer'); ?>