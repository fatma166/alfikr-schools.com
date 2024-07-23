<div class="tab-pane fade" id="pills-sanctions" role="tabpanel" aria-labelledby="pills-sanctions-tab" tabindex="0">
                    <table id="sanctionsTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>الرقم</th>
                            <th>اسم المدرس</th>
                            <th>سبب التنبية</th>
                            <th>تاريخ التنبيه</th>
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
                </div>