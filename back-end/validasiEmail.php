<?php
    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }

    session_start();
    $db = connectTOSQL();
    $email = $_GET['email'];
    $sql = "select * from profil where Email = '$email'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0){
        echo "../gambar/check.png";
    }
    else{
        echo "../gambar/cross_icon.png";
    }
?>