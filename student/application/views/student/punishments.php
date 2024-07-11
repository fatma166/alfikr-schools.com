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
            <th style="text-align: right">الرقم</th>
            <th style="text-align: right">اسم المدرس</th>
            <th style="text-align: right">سبب التنبيه</th>
            <th style="text-align: right">تاريخ التنبيه</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i=1;
            foreach($warnings as $w){?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <?php foreach($teachers as $t){
                            if($w->teacher_id == $t->id){
                                echo $t->full_name;
                            }
                        } ?>
                    </td>
                    <td><?php echo $w->reason; ?></td>
                    <td><?php echo $w->date; ?></td>
                </tr>
        <?php $i++;} ?>
    </tbody>	
</table>