<?php
	session_start();
	if(!isset($_SESSION['unique_id'])){
		header("location: hmpge.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>TalkMe | Change Profile Picture</title>
	  <link rel="stylesheet" href="style.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	</head>
	<body>
	  <header>
		<div class="container">
		  <div id="branding">
		    <h1><span class="highlight">Talk</span><span class="norm">Me</span></h1>
		  </div>
		  <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
              <a href="changepwd.php">Change Password</a>
              <a href="index.html">Login/Signup</a>
              <a href="info.php">Your Info</a>
              <a href="accdel.php">Delete Account</a>
			  <a href="hmpge.php">Home</a>
            </div>
          </div> 
		</div>
	  </header>

	 
	  <section id="showcase">
		  <div class="wrapper">
			  <section class="form-signup">
				  <div class="form-header">Change Profile Picture</div>
				  <form action="dpchange.php" method="POST" enctype="multipart/form-data">
					  <?php if(isset($_GET['error'])){?>
						<div class="error-txt"><?php echo $_GET['error']; ?></div>
					  <?php } ?>
					  <div class="field-photo">
						  <label>Select Profile Photo:</label>
						  <input type="file" id="photo" name="image" required>
					  </div>
					  <div class="field button">
						  <input type="submit" class = "form-submit" value="Submit">
					  </div>
				   </form>
				  				
			  </section>
		  </div>
</section>


	  <footer>
		<p>TalkMe,Copyright &copy; 2021</P>
	  </footer>	
    
	  <!-- <script src="signup.js"></script> -->
	</body>
   
</html>	