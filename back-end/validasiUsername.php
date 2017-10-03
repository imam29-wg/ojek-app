<?php
    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek2an");
    }

    session_start();
    $db = connectTOSQL();
    $username = $_GET['username'];
    $sql = "select * from profil where Username = '$username'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0){
        echo "check.png";
    }
    else{
        echo "cross_icon.png";
    }
?>