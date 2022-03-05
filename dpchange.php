<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
	if(!isset($_SESSION['unique_id'])){
        header("location: index.html");
    }else{
        $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
    $t= $_SESSION['unique_id'];

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
                                    $sql2 = "UPDATE userinfo SET img = '$new_img_name' WHERE unique_id = '$t'";
                                    if(mysqli_query($link, $sql2)){
                                        header("Location: thanks2.html");
                                    }
                                 mysqli_close($link);
                                }
                            }else{
                                header("Location: changedp.php?error=Please select an image file - jpeg, jpg, png!");
                            }
                        
                        
         
    
}
}
}
?>