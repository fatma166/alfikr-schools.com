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
            <th style="text-align: right">اسم المادة</th>
            <th style="text-align: right">تاريخ الشهادة</th>
            <th style="text-align: right">رقم الشهادة</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i=1;
            foreach($certificates as $c){?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <?php foreach($all_courses as $a){
                            if($c->course_id == $a->id){
                                echo $a->name;
                            }
                        } ?>
                    </td>
                    <td><?php echo $c->date; ?></td>
                    <td><?php echo $c->cert_number; ?></td>
                </tr>
        <?php $i++;} ?>
    </tbody>	
</table>