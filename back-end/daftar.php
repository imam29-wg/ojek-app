<?php
    // Fungsi untuk menghubungkan ke MySQL
    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }

    // Fungsi untuk memvalidasi form pendaftaran
    function validasiDaftar($name, $username, $email, $password, $confirm, $phone, $driver){
        if(strlen($password) < 8){
            return false;
        }
        if ($password != $confirm){
            return false;
        }
        return true;
    }


    function masukkanData($db, $name, $username, $email, $password, $confirm, $phone, $driver){
        if (validasiDaftar($name, $username, $email, $password, $confirm, $phone, $driver)){
            $sql = "insert into profil(Name, Username, Email, Password, Phone, Driver) values('$name', '$username', '$email', '$password', '$phone', '$driver')";
            if (mysqli_query($db, $sql)){
                echo "berhasil";
            }
            else{
                echo "gagal";
            }
        }
        else{
            echo "Data tidak valid";
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

    /*$sql = "select * from profil";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    $count++;
    */
    masukkanData($db, $name, $username, $email, $password, $confirm, $phone, $driver);
?>