<?php
    session_start();

    if(isset($_SESSION['unique_id'])){
        $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
        // Check connection
        if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $outgoing_id = mysqli_real_escape_string($link, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($link, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($link, $_POST['message']);

        // echo $outgoing_id;
        if(!empty($message)){
            // alert('Hello');
            $sql = mysqli_query($link, "INSERT INTO `messages` (`outgoing_msg_id`, `incoming_msg_id`, `msg`) VALUES ('$outgoing_id', '$incoming_id', '$message')") or die();
        }
    }else{
        header("location: index.html");
    }
?>