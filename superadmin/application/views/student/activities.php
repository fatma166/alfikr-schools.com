<div class="tab-pane fade" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab" tabindex="0">
                    <table id="activityTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>المدرس</th>
                            <th>التعليق</th>
                            <th>التاريخ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($comments as $c){ ?>
	<tr>
		<td><?php echo $c->teacher_name; ?></td>
		<td><?php echo $c->comment; ?></td>
		<td><?php echo $c->date; ?></td>
	</tr>
<?php } ?>
                        </tbody>
                      </table>
                </div>