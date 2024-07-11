
<html dir="rtl">
	<head>
		<title>حساب جديد</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.8">
		<style>
			#login{
				margin-top: 120px;
					
				border: solid 1px #ccc;
				background: #f2f2f2;
			}
			.input_text{
            width:90%;
            padding: 5px;
			height: 50px;
        
            
			}
			.input_text:focus{
				border: solid 1px #f1f1f1;
				border-bottom: solid 1px #000;
			}
			.info_table td{
				padding: 10px;
			   
			}
		</style>
		<script>
		    function ValidateEmail()
                {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(document.getElementById('email').value.match(mailformat))
                {
                    document.getElementById('form1').submit();
                    return true;
                }
                else
                {
                    document.getElementById('email_error').innerHTML = "لقد قمت بإدخال بريد الكتروني خاطئ";
                    document.getElementById('email').style.border= "solid 3px red";
                    return false;
                }
                }
		</script>
	</head>
	<body style="background: #fff;">
	<form method="post" action="<?php echo base_url(); ?>/login/new_account_done" id="form1">
		<table id="login" width="40%"   align="center">
		   <tr>
				<td align='center' style="height: 200px; padding: 15px;" valign="top">
					<img src="<?php echo base_url(); ?>images/osus_logo.png"  />
				</td>
			</tr>
				<tr>
			    <td align='center'><h2>إنشاء حساب جديد</h2></td>
			</tr>
			<tr>
			    
				<td align="center">
				    <span id="email_error">
				        
				    </span>
				    <input type="text" name="email" id="email" class="input_text" placeholder="البريد الالكتروني" required /></td>
				
			</tr>
			
			<tr>
				<td align="center"><input type="password"  name="password" class="input_text" placeholder="كلمة السر" required /></td>
			</tr>
			<Tr>
			        <td>
			            <input type="button" value="إنشاء الحساب"  onclick="ValidateEmail()"  style="margin-right: 10%; border: none; cursor: pointer; background: #2a3f54; color: #fff; padding: 10px;" />
			        </td>
			</Tr>
				<tr>
				<td  style="padding: 5px;"  align='center'><a  style="text-decoration: none; color: #006699; margin-right: 20px;"  href='<?php echo base_url(); ?>login' >تسجيل دخول </a>
			</td>
			</tr>
		
		</table>
	</form>
	</body>
</html>