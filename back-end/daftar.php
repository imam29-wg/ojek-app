<?php
    // Fungsi untuk menghubungkan ke MySQL
    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }

    function masukkanData($db, $name, $username, $email, $password, $confirm, $phone, $driver){
         $sql = "insert into profil(Name, Username, Email, Password, Phone, Driver) values('$name', '$username', '$email', '$password', '$phone', '$driver')";
         if (mysqli_query($db, $sql)){
            echo "berhasil";
         }
         else{
            echo "gagal";
         }
    }
    session_start();
    $db = connectTOSQL();

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $phone = $_POST['phone'];
    $driver = $_POST['driver'];
    if ($driver){
        $driver = 1;
    }
    else{
        $driver = 0;
    }

    masukkanData($db, $name, $username, $email, $password, $confirm, $phone, $driver);

    header("Location: ../front-end/login.html?");
?>