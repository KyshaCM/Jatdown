<?php
function is_username_email_exists($conn,$username,$email){
    $response=false;
    $query = "select username from users where username =? or email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss',$username,$email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $response = true;
    }
    $stmt->close();

    return $response;
}