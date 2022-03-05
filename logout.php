<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
        // Check connection
        if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $logout_id = mysqli_real_escape_string($link, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($link, "UPDATE userinfo SET status = '{$status}' WHERE unique_id = '{$logout_id}'");
            if($sql){
                session_unset();
                session_destroy();
                header("location: index.html");
            }
        }else{
            header("location: hmpge.php");
        }
    }else{
        header("location: index.html");
    }
?>