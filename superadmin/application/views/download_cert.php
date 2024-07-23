<html>
    <head>
        <meta http-equiv="Content-Type" content="charset=utf-8"/>
        <style> 
        
        </style>
    </head>
    <body>
        <div style="width: 1000px; height:700px; background: url(<?php echo base_url(); ?>images/cert.jpg); background-size: cover;">
    <p style="position: absolute; left: 500px; top: 45px; font-weight: bold; font-size: 40px;">
       
        <?php echo $words['cert_sentence_0'] ; ?>
    </p>
    <p style="padding-left: 270px; padding-top: 145px; font-weight: bold; font-size: 40px; text-align: center;">
        <?php echo $words['cert_sentence_1']; ?>
        
        
        
    </p>
    <p style="padding-left: 250px; padding-top: 10px;  font-weight: bold; font-size: 40px; text-align: center;">
        <?php echo $student_info[0]->first_name .' '. $student_info[0]->last_name; ?>
        
    </p>
    <p style="padding-left: 250px; padding-top: 10px; font-weight: bold; font-size: 40px; text-align: center;">
        <?php echo $words['cert_sentence_2']; ?>
    </p>
    <p style="padding-left: 300px; padding-top: 10px; font-weight: bold; font-size: 40px ; text-align: center;">
        <?php echo $course_info[0]->name; ?>
        
    </p>
    
    
    <p style="margin-left: -100px; padding-top: 150px; font-weight: bold; font-size: 20px ; text-align: center;">
        <?php echo $cert[0]->date; ?>
    </p>
    
</div>
    </body>
</html>
<script>
window.print();
</script>

