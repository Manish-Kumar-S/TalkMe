<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

	$link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	if (!empty($uname) && !empty($pwd)){
        $sql = mysqli_query($link, "SELECT Username FROM userinfo WHERE Username = '$uname'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: changepwd.php?error=$uname - This username does not exist!");
        }else{
            if($pwd != $pass){
                header("Location: changepwd.php?error=Please re-enter the same password!");
            }else{
                if(strlen($pwd) <= 6 || strlen($pwd) >= 20){
                    header("Location: changepwd.php?error=The password should have more than 6 characters and less than 20 characters!");
                }else{
                    $sql = "UPDATE userinfo SET Pwd = '$pwd' WHERE Username = '$uname'";
                    $query = mysqli_query($link, $sql);
                    header("Location: thanks1.html");
                }
            }
        }
        }else{
            header("Location: pwdchange.php?error=All inputs are required!");
        }
    }
?>