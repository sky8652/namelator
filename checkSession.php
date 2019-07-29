<?php

function checkSession($link, $mail, $session){
    echo($session);
    if($session=="google")
        return true;
    $querystring = "select * from users where username='".$username."' and session='". $session."'";
    $result = mysqli_query($link, $querystring);

    $num_rows = mysqli_num_rows($result);

    if($num_rows > 0)
        return true;
    else
        return false;
}

?>