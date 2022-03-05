<?php
    while($row = mysqli_fetch_assoc($sql)){
        $tmp = $row['unique_id'];
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = '$tmp'
                 OR outgoing_msg_id = '$tmp') AND (outgoing_msg_id = '$outgoing_id'
                 OR outgoing_msg_id = '$tmp') ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($link, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $result = "No message available";
        }
        // (strlen($result) >28) ? $msg = substr($result, 0, 28).'...' : $msg = $result; //trimming the message if more than 28 words
        // ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you =""; //adding you: for your messages


        //check user is offline or not
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $output .= '<a href="chatbox.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                    <img src="images/'. $row['img'].'" alt="">
                    <div class="det">
                        <span>'. $row['Username'].'</span>
                        
                    </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>