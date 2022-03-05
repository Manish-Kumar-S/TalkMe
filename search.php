<?php
    session_start();
    $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
    // Check connection
    if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($link, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($link, "SELECT * FROM userinfo WHERE NOT unique_id = {$outgoing_id} AND (Username LIKE '%{$searchTerm}%')");
    if(mysqli_num_rows($sql) > 0){
       include "data.php";
    }else{
        $output .= "No user found related to your search item";
    }

    echo "$output";

?>