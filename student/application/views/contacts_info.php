<?php $this->load->view('template/body'); ?>

<style>
        .input_text{
            width: 300px;
            padding: 5px;
        
            
        }
        .input_text:focus{
            border: solid 1px #f1f1f1;
            border-bottom: solid 1px #000;
        }
        .info_table td{
            padding: 10px;
           
        }
</style>
<?php
    if($this->input->get('msg') == 'done'){
?>
<br /><br /><br />
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   تم حفظ معلومات بنجاح
                  </div>
<?php
	}
?>
<div class="col-md-12 col-sm-12 col-xs-12" style="width: 100%;">
                  <div class="x_panel">
                    <div class="x_title">
                        معلومات الاتصال
                    </div>
                     <div class="x_content">
                      <div class="dashboard-widget-content">
                      
                          <form method="post" action="<?php echo base_url(); ?>/student/edit_contacts_info" >
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                     <select name="address_country" class="form-control">
										<option value="0">بلد السكن</option>
										<?php
											
											foreach($countries as $k){
												if($user->address_country == $k->id){
													echo "<option value='$k->id' selected>$k->country_name</option>";
												}
												else{
													echo "<option value='$k->id'>$k->country_name</option>";
												}
													
											}
										?>
									</select>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <input type="text"  value="<?php echo $user->address_city; ?>" name="address_city" class=" form-control" placeholder="المدينة" />
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <input type="text" name="postal_code" class="form-control"   value="<?php echo $user->postal_code; ?>"  placeholder="الرمز البريدي"  />
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                     <input type="text" name="address" class="form-control"   value="<?php echo $user->address; ?>"  placeholder="العنوان بالتفصيل"  />
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <input type="text" name="mobile" class="form-control"   value="<?php echo $user->mobile; ?>"  placeholder="رقم الهاتف"  />
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                         <input type="text" name="parent_mobile" class="form-control"   value="<?php echo $user->parent_mobile; ?>"  placeholder="رقم هاتف ولي الأمر"  />
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                         <input type="text" name="whatsapp" class="form-control"   value="<?php echo $user->whatsapp; ?>"  placeholder="رقم الواتس أب"  />
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                         <input type="submit" value="حفظ" name="btn" class="btn btn-success" />
                                  </div>
                                 
                         
                          
                          
                          
          
                     
                      </div>
                    </div>
            </div>
            </div>
   <?php $this->load->view('template/footer'); ?>