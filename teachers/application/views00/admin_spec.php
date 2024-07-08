<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          

          

           



	<form method="post" action="<?php echo base_url(); ?>universities/new_spec">
		<table>
			<tr>
				<td>اسم الاختصاص</td>
				<td><input type="text" name="name" style='background: #fff; width: 300px;' /></td>
			</tr>
			<tr>
				<td>اسم الجامعة</td>
				<td>
					<select name="univ_id">
						<option value="0">الرجاء اختيار الجامعة</option>
						<?php
							
							foreach($universities as $u){
						?>
								<option value='<?php echo $u->id; ?>'><?php echo $u->name; ?></option>

						<?php						
							}
						?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>النــوع</td>
				<td>
					<select name="type">
						<option value="0">الكليات</option>
						<option value="1">المعاهد</option>
						<option value="2">الماجستير</option>
						<option value="3">الدكتوراة</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>اللغة</td>
				<td>
					<select name="lang">
						<option value="TR">TR</option>
						<option value="EN">EN</option>
						<option value="TR / EN">TR / EN</option>
						<option value="AR">AR</option>
						
					</select>
				
				</td>
			</tr>
			<tr>
				<td>
					الاختصاص الأب
				</td>
				<td>
				<select name="parent_id">
						<option value="0">لا يوجد أب</option>
				<?php
								
								foreach($p_spec as $s){
							?>
							
									<option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
							
							<?php
								}
							?>
				</select>
			</tr>
			<tr>
				<td colspan='2'><input type='submit' value='إضافة' /></td>
			</tr>
	</table>
	
	</form>
	<hr />
	
	<form method="post" action="<?php echo base_url(); ?>universities/spec">
	<select name="univ_id">
						<?php
							
							foreach($universities as $u){
						?>
								<option value='<?php echo $u->id; ?>'><?php echo $u->name; ?></option>

						<?php						
							}
						?>
	
	
	</select>
	  
	    <input type="submit" value="عرض الاختصاصات" />
	</form>
	<hr />
	
	    
	<?php 
	if($speces != ''){
	      
	
		
		foreach($speces as $s){
			
			
			
?>
    <form method="post" action="<?php echo base_url(); ?>/universities/edit_spec">
    <table width="100%" class='table'>
			<tr>
				<Td><?php echo $s->id; ?></tD>
				<Td><input type="text" name="name" value="<?php echo $s->name; ?>" /></tD>
				<Td><?php echo $s->lang; ?></tD>
				<Td>
				<?php
					if($s->type_id == 0){
						echo "الكليات";
					}
					else if($s->type_id  == 1){
						echo "المعاهد";
					}
					else if($s->type_id  == 2){
						echo "الماجستير";
					}
					else if($s->type_id  == 3){
						echo "الدكتوراة";
					}
				?>
				</tD>
				<Td>
					<?php
						if( $s->parent_name == ''){
							echo "لا يوجد تصنيف أب";
						}
						else{
							echo $s->parent_name;
						}
					?>
	
						
				</tD>
				<td>
				    <input type="text" name="duration" value="<?php echo $s->duration; ?>" 
				        placeholder="المدة"
				    />
				</td>
				<td>
				    <input type="text" name="price_before" value="<?php echo $s->price_before; ?>" 
				        placeholder="السعر قبل الحسم"
				    />
				</td>
				<td>
				    <input type="text" name="price_after" value="<?php echo $s->price_after; ?>" 
				        placeholder="السعر بعد الحسم"
				    />
				</td>
				<Td><?php //echo $row_s[1]; ?></tD>
				<td>
				    <input type="submit" value="تعديل" />
				</td>
				<td><a href='<?php echo base_url(); ?>universities/delete_spec/<?php echo $s->id; ?>'>حذف</a></td>
			</tr>
				

    </table>
    <input type="hidden" name="univ_id" value="<?php //echo $_GET['univ_id']; ?>" />
    <input type="hidden" name="spec_id" value="<?php echo $s->id; ?>" />
    </form>
    
    <hr /><br />
<?php
			
		}
	}
	?>
	
	
	
	

 <?php $this->load->view('template/footer'); ?>
	