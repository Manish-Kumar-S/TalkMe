<?php
	session_start();
	if(isset($_SESSION['unique_id'])){
		header("location: hmpge.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>TalkMe | Welcome | Sign-up</title>
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
				  <div class="form-header">SignUp</div>
				  <form action="" method="POST">
					  <div class="field">
						  <label>FullName:</label>
						  <input type="text" id="name" name="fullname" size = "50" maxlength = "50" placeholder="Enter your fullname" required>
					  </div>
					  <div class="field">
						  <label>Phone No:</label>
						  <input type="text" id="phno" name="phno" size = "10" maxlength = "10" placeholder="Enter phone number" required>
					  </div><div class="field">
						  <label>DoB:</label>
						  <input type="date" id="DoB" name="DoB" placeholder="Enter your date of birth" required>
					  </div>
					  <div class="field button">
						  <input type="submit" class = "form-submit" value="Next">
					  </div>
				   </form>
				  				
			  </section>
		  </div>
</section>

	  <footer>
		<p>TalkMe,Copyright &copy; 2021</P>
	  </footer>	

	</body>

</html>	
<?php
if($_SERVER["REQUEST_METHOD"] == 'POST'){
	$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
	$phno = isset($_POST['phno']) ? $_POST['phno'] : '';
	$dob = isset($_POST['DoB']) ? $_POST['DoB'] : '';
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
	
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	// Attempt insert query execution
	$sql = "INSERT INTO general (FullName, PhNo, DoB) VALUES ('$fullname', '$phno', '$dob')";
	mysqli_query($link,$sql) ;
	//	//$sql = "SELECT * FROM general";
		//$result = mysqli_query($link,$sql) ;

			//while($row = mysqli_fetch_array($result)){
				//echo $row['FullName']." &nbsp; ".$row['ID']." &nbsp; ".$row['PhNo']."  &nbsp;".$row['DoB']."  &nbsp;";
				//echo "<br>";
			//}

	//if(mysqli_query($link, $sql)){
	// echo "Records inserted successfully.";
	//} else{
	// echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	//}
	// Close connection
	mysqli_close($link);
	header("Location: signup1.php");
}
?>