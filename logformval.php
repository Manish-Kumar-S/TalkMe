<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
	$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';

	$link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	if (!empty($uname) && !empty($pwd)){
            if(strlen($pwd) <= 6 || strlen($pwd) >= 20){
                header("Location: login.php?error=The password should have more than 6 characters and less than 20 characters!");
            }else{
               $sql = mysqli_query($link, "SELECT * FROM userinfo WHERE Username = '$uname' AND Pwd = '$pwd'");
                        if(mysqli_num_rows($sql) > 0){
                            $row = mysqli_fetch_assoc($sql);
                            $status = "Active now";
                            $sql2 = mysqli_query($link, "UPDATE userinfo SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                            if($sql2){  
                                $_SESSION['unique_id'] = $row['unique_id'];
                                header("Location: hmpge.php");
                            }
                        }else{
                            header("Location: login.php?error=Username or Password is incorect!");
                        }
                    }
                    
                
            }else{
                header("Location: login.php?error=All inputs are required!");
            }
        }
?>