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

    $sql = "SELECT ID FROM userinfo WHERE unique_id = {$_SESSION['unique_id']}";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if(isset($_POST['delacc-form'])){
                if(mysqli_query($link, "DELETE FROM userinfo WHERE unique_id = {$_SESSION['unique_id']}")){
                    if(mysqli_query($link, "DELETE FROM general WHERE ID = {$row['ID']}")){
                        session_unset();
                        session_destroy();
                        header("location: delconf.html");
                    }
                }
            }
        }

    
	
}
}
}
?>