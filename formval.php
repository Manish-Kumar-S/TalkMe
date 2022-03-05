<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
	$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';
	$pass = isset($_POST['password']) ? $_POST['password'] : '';

	$link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	if (!empty($uname) && !empty($pwd) && !empty($pass)){
        $sql = mysqli_query($link, "SELECT Username FROM userinfo WHERE Username = '$uname'");
        if(mysqli_num_rows($sql) > 0){
            header("Location: signup1.php?error=$uname - This username is already in use!");
        }else{
            if(strlen($uname) > 12){
                header("Location: signup1.php?error=Username should not exceed 12 characters!");
            }else{
                if(strlen($pwd) <= 6 || strlen($pwd) >= 20){
                    header("Location: signup1.php?error=The password should have more than 6 characters and less than 20 characters!");
                }else{
                    if($pwd != $pass){
                        header("Location: signup1.php?error=Please re-enter the same password!");
                    }else{
                        if(isset($_FILES['image'])){
                            $img_name = $_FILES['image']['name'];
                            $img_type = $_FILES['image']['type'];
                            $tmp_name = $_FILES['image']['tmp_name'];
    
                            $img_explode = explode('.', $img_name);
                            $img_ext = end($img_explode);
    
                            $extensions = ['png','jpeg','jpg'];
                            if(in_array($img_ext, $extensions) === true){
                                $time = time();
    
                                $new_img_name = $time.$img_name;
    
                                if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                                    $status = "Active now";
                                    $random_id = rand(time(), 1000000);
    
                                    $sql2 = mysqli_query($link, "INSERT INTO userinfo (unique_id, Username, Pwd, img, status) VALUES ('$random_id', '$uname', '$pwd', '$new_img_name', '$status')");
                                    
                                    if($sql2){
                                        $sql3 = mysqli_query($link, "SELECT * FROM userinfo WHERE Username = '$uname'");
                                        if(mysqli_num_rows($sql3) > 0){
                                            $row = mysqli_fetch_assoc($sql3);
                                            $_SESSION['unique_id'] = $row['unique_id'];
                                            header("Location: thanks.html");
                                        }
                                    }else{
                                        header("Location: signup1.php?error=Something went wrong!");
                                    }
                                }
                            }else{
                                header("Location: signup1.php?error=Please select an image file - jpeg, jpg, png!");
                            }
                        }
                        
                    }
                }
            }
            }
	}else{
		header("Location: signup1.php?error=All inputs are required!");
	}
}
?>