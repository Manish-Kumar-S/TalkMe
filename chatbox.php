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
        <title>TalkMe | Homepage</title>
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
                    <a href="info.php">Your Info</a>
                    <a href="accdel.php">Delete Account</a>
                  </div>
                </div> 
              </div>
          </header>
    
          <section class="container1">
            <div class="wrapper">
              <section class="chat-area">
                <header>
                  <?php 
                    $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
                    // Check connection
                    if($link === false){
                      die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $user_id = $_GET['user_id'];

                    $sql = mysqli_query($link, "SELECT * FROM userinfo WHERE unique_id = '$user_id'");

                    if(mysqli_num_rows($sql) > 0){
                      $row = mysqli_fetch_assoc($sql);
                    }
                  ?>
                  <a href="hmpge.php" class="back-icon"><i class="fas fa-arrow-left"></i></a> 
                  <div class="content">
                    <img src="images/<?php echo $row['img'] ?>" alt="">
                    <div class="det">
                      <span id="head" style="color: black;"><?php echo $row['Username'] ?></span>
                      <p><?php echo $row['status'] ?></p>
                    </div>
                  </div>
                </header>
                <div class="chat-box">
                    
                </div>
                <form action="#" class="typing-area" autocomplete="off">
                    <input type="text" class="out" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" class="in" id="in" name= "incoming_id" value="<?php echo $user_id; $_SESSION['incoming'] = $user_id;?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                    <button id="send"><i class="fab fa-telegram-plane"></i></button>
                </form>
              </section>
            </div>
          </section>

          <script src="chat.js"></script>
          <script>
            $(document).ready(function(){
                $("#head").click(function(){
                  // alert("hello");
                  // var incoming=document.querySelector("#in").value;
                  // $.post("userdet.php",{incoming:incoming},function(){
                  //   alert(incoming);
                    window.location="userdet.php";
                  
                });
            });
            
          </script>
    
        </body>
    
    </html>	