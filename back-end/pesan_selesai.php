<?php
    function get_rating(){
        $nama_bintang = $_GET['bintang'];
        if ($nama_bintang === "bintang_1"){
            return 1;
        }
        else if ($nama_bintang === "bintang_2"){
            return 2;
        }
        else if ($nama_bintang === "bintang_3"){
            return 3;
        }
        else if ($nama_bintang === "bintang_4"){
            return 4;
        }
        else{
            return 5;
        }
    }

//    $rating = get_rating();
//    $komentar = $_GET['comment'];

    function masukkanData($db, $name, $username, $email, $password, $confirm, $phone, $driver){
        $sql = "insert into profil(Name, Username, Email, Password, Phone, Driver) values('$name', '$username', '$email', '$password', '$phone', '$driver')";
        if (mysqli_query($db, $sql)){
            echo "berhasil";
        }
        else{
            echo "gagal";
        }
    }

?>