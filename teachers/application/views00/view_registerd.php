<?php $this->load->view('template/body'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">

		   





<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>


<?php
    foreach($registerations as $r){
?>

<Table width="100%" class='table'>
    <tr>
        <td><?php echo $r->id; ?></td>
        <td><?php echo $r->full_name; ?></td>
        <td><?php echo $r->father_name; ?></td>
        <td><?php echo $r->mobile; ?></td>
        <td><?php echo $r->email; ?></td>
        <td><?php echo $r->birthdate; ?></td>
        <td><?php echo $r->hear_from; ?></td>
        <td><?php echo $r->address; ?></td>
        <td><?php echo $r->program; ?></td>
        <td><?php echo $r->city; ?></td>
    </tr>
    <tr>
        <td><?php echo $r->nationality; ?></td>
        <td><?php echo $r->department; ?></td>
        <td><?php echo $r->university; ?></td>
        <td><?php echo $r->spec; ?></td>
        <td><?php echo $r->english_level; ?></td>
        <td><?php echo $r->money; ?></td>
        <td><?php echo $r->mark; ?></td>
        <td><?php echo $r->message; ?></td>
        <td><?php echo $r->gender; ?></td>
        <td><?php //echo $r->date; ?></td>
    </tr>
    <tr>
        <td><a href="<?php base_url(); ?>../images/<?php echo $r->photo; ?>" target="_blank"><img src="../../images/files/<?php echo $r->photo; ?>" width="100" /></a></td>
        <td><a href="../../<?php echo $r->diploma; ?>" target="_blank"><img src="../../images/files/<?php echo $r->diploma; ?>"  width="100" /></a></td>
        <td><a href="../../<?php echo $r->passport; ?>" target="_blank"><img src="../../images/files/<?php echo $r->passport; ?>"  width="100" /></a></td>
        <td><a href="../<?php echo $r->transcript; ?>" target="_blank"><img src="../../images/files/<?php echo $r->transcript; ?>"  width="100" /></a></td>
    </tr>
</Table>
<br /><br />
<?php
    }
?>





          
 
 
 <?php $this->load->view('template/footer'); ?>