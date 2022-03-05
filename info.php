<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: index.html");
  }
?>

<!DOCTYPE html>
    <html>
    
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TalkMe | Info</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      </head>
    
        
        <body>
          <header>
            <div class="hmpgecontainer">
              <div id="branding">
                <h1><span class="highlight">Talk</span><span class="norm">Me</span></h1>
              </div>
	
                <div class="dropdown">
                  <button class="dropbtn">Menu</button>
                  <div class="dropdown-content">
                    <a href="changepwd.php">Change Password</a>
                    <a href="index.html">Login/Signup</a>
                    <a href="changedp.php">Change Profile Picture</a>
                    <a href="accdel.php">Delete Account</a>
                    <a href="hmpge.php">Home</a>
                  </div>
                </div> 
              </div>
          </header>
    
          <section class="container1">
          <div class="wrapper">
            <?php 
                      $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
                      // Check connection
                      if($link === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                      }
                      $t = $_SESSION['unique_id'];

                      $sql1 = "SELECT * FROM userinfo WHERE unique_id = '$t'";
                      $result =mysqli_query($link, $sql1);
                      if($result){
                        $row = mysqli_fetch_assoc($result);
                      }

                      $sql = "SELECT * FROM general WHERE ID = '".$row['ID']."'";
                      $query = mysqli_query($link, $sql);

                      $row = mysqli_fetch_assoc($query);

            mysqli_close($link);
            ?> 
            <div class="info">
              <span>Fullname :<?php echo $row['FullName']; ?></span><br><br>
              <span>Phone No :<?php echo $row['PhNo']; ?></span><br><br>
              <span>DoB :<?php echo $row['DoB']; ?></span><br><br>
            </div>
            
          </div>
          </section>
          
         
        </body>
        </html>	
    