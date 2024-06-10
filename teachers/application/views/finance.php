<?php $this->load->view('template/body'); ?>


<?php
    if($this->input->get('msg') == 'done'){
?>
<br /><br /><br />
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   تم إضافة الدفعة بنجاح .. سيتم الموافقة عليها من قبل الإدارة خلال 24 ساعة 
                  </div>
<?php
    }

?>


<h2>المتبقي من الدفعات <span id="toplam"></span>
<div style="float: left">
	<input type="button" value="+ إضافة دفعة" onclick="location.href='<?php echo base_url(); ?>finance/add_payment'" class="btn btn-success" />

</div></h2>

 <div class="col-md-12 col-sm-6 col-xs-12" width="100%">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>تاريخ الدفعات</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table" dir="rtl">
                      <thead>
                        <tr>
                          <th style='text-align: right;'></th>
                          <th  style='text-align: right;'>المبلغ</th>
                          <th  style='text-align: right;'>الدورة</th>
                          <th  style='text-align: right;'>التاريخ</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php
							
							$i = 1;
							$toplam = 0;
							foreach($finance as $row){
								
								
						?>
					   <tr <?php if($row->type == 1){ ?> style="background: #d2ecd8;" <?php } else{ ?> style="background: #ecd2d3;"<?php } ?>>
                          <td><?php echo $i; ?></td>
                          <td><?php if($row->type == 1){ ?>+<?php } else{ ?>-<?php } ?><?php echo $row->amount; ?></td>
                          <td><?php echo $row->title; ?></td>
                          <td><?php echo $row->date; ?></td>
                        </tr>
                       <?php
								$i++;
								if($row->type == 1){ 
									$toplam = $toplam - $row->amount; 
								} 
								else{ 
									$toplam = $toplam + $row->amount; 
								} 
							}
						?>
						<script>
							document.getElementById("toplam").innerHTML = '<?php echo $toplam; ?>';
						</script>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              
              
              <table width='100%'>
    <tr>
        <td colspan="2" style='background: green; color: white' align='center'>معلومات دفع الأقساط</td>
    </tr>
    <tr>
        <td valign="top">
            
            
        </td>
        <td valign="top">
            من خارج تركيا عن طريق الويسترن يونيون<br />
            الاسم <br />
            Mohamed Khaldoun <br />
            الكنية <Br/>
            Yaldani<br/>
            البلد <br/>
            Germany<br/>
            المدينة <br/>
            Chemnitz
        </td>
    </tr>
    <tr>
        <td colspan="2">
             من ألمانيا وأوربا<br />
             الاسم<br />
             Mohamed Khaldoun Yaldani<br />
             رقم الآيبان<br />
             DE79870500001190448862<br />
             اسم البنك<BR />
             Sparkasse
        </td>
    </tr>
</table>



<?php $this->load->view('template/footer'); ?>
