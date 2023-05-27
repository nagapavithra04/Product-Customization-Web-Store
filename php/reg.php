<?php session_start() ?>
<html>
    <head>
        <title>SIGN-IN PAGE</title>
        <link rel="stylesheet" href="..\css\regi.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        
            <div class="image">
                <img style="width: 800px;height: 730px;" src="..\img\login.png">
            </div>
            <div class="registerform">
                <h1 style="font-size: 4ch; text-align: left;margin-left:50px; margin-top: 40px; color:rgb(59, 88, 212)">CREATE ACCOUNT</h1><br>
                <form action="" id="signup-frm">
                    <input name="name" class="input" type="text" size="35" placeholder="USERNAME" required /><br><br><br>
                    <input name="email" class="input" type="email" size="35" placeholder="EMAIL" required /><br><br><br>
                    <input name="password" class="input" type="password" size="35" placeholder="PASSWORD" required /><br><br><br>
                    <input name="address" class="input" type="text" size="35" placeholder="ADDRESS" required /><br><br><br>
                    <input name="phoneno" class="input" type="number" maxlength="10" size="35" placeholder="PHONE-NO" required /><br><br><br>
                    <input type="submit" class="button" name="login" value="SIGNUP" />
                </form>
                <h2 style="font-size: 2ch;color:black;text-align: left; margin-top: 40px;margin-left:50px;">ALREADY HAVE AN ACCOUNT?<a href="..\php\login.php" >LOGIN</a></h2>
            </div>
        </div>
<script>
	$('#signup-frm').submit(function(e){
		e.preventDefault()
		$('#signup-frm input[type="submit"]').attr('disabled',true).html('Saving...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=signup',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#signup-frm input[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'login.php?page=home' ?>';
				}else{
					$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
					$('#signup-frm input[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>
</body>

</html>