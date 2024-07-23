<?php $this->load->view('template/body'); ?>
<style>
    .bg{
        background: #f2f2f2;
    }
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                        <h4>قائمة الدروس</h4>
                    </div>
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
                          
                            
                            
<br />
<br />

<h2 style="color: red;">

</h2>
<h5>ملاحظة: الدروس مرتبة من الدرس الأخير إلى الأول</h5>
           <table width='100%' class="table">

<?php
   
    $i = 0;
 
    
    foreach($lessons as $row){
        
?>
            
         <tr <?php if($i%2 == 1){ ?> class='bg' <?php } ?> onclick='location.href="<?php echo base_url(); ?>courses/view_lesson/<?php echo $row->id; ?>"' style='cursor: pointer;'>
            <td>
                <i class='fa fa-play'></i>
            </td>
            <td>
                <?php echo $row->title; ?>
            </td>
            
         </tr>
                        
                
<?php
                $i++;
     }

      
?>

</table>
     
                      </div>
                    </div>
            </div>
            </div>
			
			
			
			
<?php $this->load->view('template/footer'); ?>