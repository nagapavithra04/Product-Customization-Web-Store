<?php session_start() ?> 
  <html>
  <head>
    <title>loginpage</title>
    <link rel="stylesheet" href="..\css\SPLIT1.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <body>
    <div class="image">
      <img style="width: 800px;height: 730px;" src="..\img\login.png">
  </div>
    <div class="loginform">
      <br>
      <h1 style="font-size: 4ch;color:rgb(59, 88, 212);text-align: left;margin-left: 50px;">LOGIN</h1><br>
      <form action="" id="login-frm">
        <input type="email" class="input" name="email" size="30" placeholder="EMAIL-ID" required><br><br><br><br>
        <input type="password" class="input" name="password" size="30" placeholder="PASSWORD" required><br><br><br>
        <input type="submit" class="button" name="login" value="LOGIN" />
      </form>
      <h2 style="font-size: 2ch;color: black;text-align: left; margin-top:40px;margin-left:50px">NEW TO BLUELIGHT?<a href="..\php\reg.php">Create Account</a></h2>
      
    </div>
<script>
	
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm input[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm input[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'home.php?page=home' ?>';
				}
				else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm input[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>
  </body>

</html>