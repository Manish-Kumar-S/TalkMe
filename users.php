<?php
    session_start();
    $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
                    // Check connection
    if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($link, "SELECT * FROM userinfo WHERE NOT unique_id = {$outgoing_id}");
    $output = "";

    if(mysqli_num_rows($sql) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>