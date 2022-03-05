<!DOCTYPE html>
<html lang="en">

	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>TalkMe | Change Password</title>
	  <link rel="stylesheet" href="style.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	</head>
	<body>
	  <header>
		<div class="container">
		  <div id="branding">
		    <h1><span class="highlight">Talk</span><span class="norm">Me</span></h1>
		  </div>
		</div>
	  </header>

	 
	  <section id="showcase">
		  <div class="wrapper">
			  <section class="form-signup">
				  <div class="form-header">Change Password</div>
				  <form action="pwdchange.php" method="POST">
					  <?php if(isset($_GET['error'])){?>
						<div class="error-txt"><?php echo $_GET['error']; ?></div>
					  <?php } ?>
					  <div class="field">
						  <label>Username:</label>
						  <input type="text" id="uname" name="uname" placeholder="Enter your username" >
					  </div>
					  <div class="field">
						  <label>New Password:</label>
						  <input type="password" id="pwd" name="pwd" placeholder="Enter password" >
					  </div>
					  <div class="field">
						  <label>Confirm New Password:</label>
						  <input type="password" id="password" name="password" placeholder="Re-enter your password" >
					  </div>
					  <div class="field button">
						  <input type="submit" class = "form-submit" value="Submit">
					  </div>
				   </form>
				<p class="newlink" style="margin-top: -10px;">New here?<a href="signup.php">Signup</a></p>
				  				
			  </section>
		  </div>
</section>


	  <footer>
		<p>TalkMe,Copyright &copy; 2021</P>
	  </footer>	
    
	  <!-- <script src="signup.js"></script> -->
	</body>
   
</html>	