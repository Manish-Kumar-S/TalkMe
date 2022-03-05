<?php
    session_start();

    if(isset($_SESSION['unique_id'])){
        $link = mysqli_connect("sql311.epizy.com", "epiz_29338788", "rjlMRIJISF", "epiz_29338788_user_details");
        // Check connection
        if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sess = $_SESSION['unique_id'];
        $outgoing_id = mysqli_real_escape_string($link, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($link, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($link, $_POST['message']);
        $output = "";

        $sql = "SELECT * FROM messages 
                LEFT JOIN userinfo ON userinfo.unique_id = messages.incoming_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$sess}) ORDER BY msg_id";
        // $sql = "SELECT * FROM userinfo U, messages M WHERE (M.outgoing_msg_id = {$outgoing_id} AND M.incoming_msg_id = {$incoming_id})
        //          OR (M.outgoing_msg_id = {$incoming_id} AND M.incoming_msg_id = {$sess}) ORDER BY msg_id";
        $query = mysqli_query($link, $sql);  //discord vada 
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="det">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <div class="det">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
            echo $output;
        }
    }else{
        header("location: index.html");
    }
?>