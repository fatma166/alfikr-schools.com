
<?php $this->load->view('template/body'); ?>












				
  <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">&nbsp;
                                <div class="pull-right"><a href="<?php echo base_url(); ?>master/new_live_class" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;إنشاء صف مباشر جديد</a> <a href="#" data-perform="panel-dismiss"></a> </div>
                            </div>
                            <div class="panel-wrapper collapse out" aria-expanded="true">
                                <div class="panel-body">
								
								
							
									
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
					
            <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                          
                                <div class="panel-body table-responsive">
								  الصفوف المباشرة
								  <hr class="sep-2">
			
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: right;">العنوان</th>
							<th style="text-align: right;">Meeting ID</th>
							<th style="text-align: right;">الدورة</th>
							<th style="text-align: right;">القسم</th>
							<th style="text-align: right;">التاريخ</th>
							<th style="text-align: right;">وقت البداية</th>
							<th style="text-align: right;">وقت النهاية</th>
							<th style="text-align: right;">المستخدم</th>
						
							
							<th></th>
                        </tr>
                    </thead>
                    <tbody>
                       
					 <?php 
					 		foreach ($live_classes as $l) { ?>
                        <tr>
							<td><?php echo $l->title; ?></td>
							<td><? echo $l->meeting_id;?></td>
							<td>
							    
							    
							</td>
							<td>
							    
							    
							</td>
							<td><?php echo $l->date; ?></td>
							<td><?php echo $l->start_time; ?></td>
                            <td><?php echo $l->end_time; ?></td>
							<td>
							
						    </td>
							
							<td>
							
							</td>
		
                            <td>
							
							
						
							<a href="<?php echo base_url();?>../home/host_live_class/<?php echo $l->id; ?>"><button type="button" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-youtube-play"></i> بدء البث</button></a>
							
							
                            <a href="<?php echo base_url(); ?>master/delete/live_classes/<?php echo $l->id; ?>" ><button type="button" class="btn btn-danger btn-rounded btn-sm"><i class="fa fa-times"></i> حذف</button></a>
							
                            </td>
                        </tr>
							 <?php } ?>

       			
						
                    </tbody>
                </table>
				</div>
			</div>
		</div>
	</div>
</div>


	<script>
    $('form').submit(function (e) {
        $('#install_progress').show();
        $('#modal_1').show();
        $('.btn').val('saving, please wait...');
        $('form').submit();
        e.preventDefault();
    });
	
</script>











<?php $this->load->view('template/footer'); ?>

