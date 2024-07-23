<?php $this->load->view('template/body'); ?>
<form method="post" action="<?php echo base_url(); ?>master/new_outgoing_payment_done">
<table class="table">
    <tR>
        <td>نوع الدفعة</td>
        <td><select name="payment_for_id">
            <?php foreach($payments_for_types as $p){ ?>
            
            
            <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
            
            <?php 
                }
            ?>
        </select></td>
        
    </tR>
    <tr>
        <td>المبلغ</td>
        <td><input type="text" name="amount" /></td>
    </tr>
    <tr>
        <td>التاريخ</td>
        <td><input type="text" name="date" id="sandbox-container1" autocomplete="off" /></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
    </tr>
</table>
</form>


<link rel="stylesheet" href="https://osus.academy/new_admin/css/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	
	$(document).ready(function() {
	$('#sandbox-container1').datepicker({
			dateFormat: 'yy-mm-dd'
	});

	});
</script>	

<?php $this->load->view('template/footer'); ?>
