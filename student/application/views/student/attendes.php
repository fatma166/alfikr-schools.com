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

<table class='table table-striped table-bordered'  id="datatable">
    <thead>
        <tr>
            
            <th style="text-align: right">المحاضرة</th>
        
            <th style="text-align: right">وقت الحضور</th>
          
    
        </tr>
    </thead>
    <tbody>
        <?php foreach($attendes as $a){ ?>
                    <tr>
                        <td><?php echo $a->time_table->title; ?></td>
                        <td><?php echo $a->date; ?></td>
                    </tr>
        <?php } ?>
    </tbody>	
</table>