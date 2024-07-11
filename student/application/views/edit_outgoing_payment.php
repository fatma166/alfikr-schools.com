<?php $this->load->view('template/body'); ?>
<form method="post" action="<?php echo base_url(); ?>master/edit_outgoing_payment_done">
<table class="table">
    <tR>
        <td>نوع الدفعة</td>
        <td><select name="payment_for_id">
            <?php foreach($payments_for_types as $p){ ?>
            
            
            <option <?php if($payment[0]->payment_for_id == $p->id){ ?>selected<?php } ?> value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
            
            <?php 
                }
            ?>
        </select></td>
        
    </tR>
    <tr>
        <td>المبلغ</td>
        <td><input type="text" name="amount" value="<?php echo $payment[0]->amount; ?>" /></td>
    </tr>
    <tr>
        <td>التاريخ</td>
        <td><input type="text" name="date" id="sandbox-container1" value="<?php echo $payment[0]->date; ?>"  autocomplete="off" /></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="btn btn-success" value="تعديل" /></td>
    </tr>
</table>
<input type="hidden" name="id" value="<?php echo $payment[0]->id; ?>" />
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
