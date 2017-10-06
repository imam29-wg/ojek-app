<?php
    session_start();
    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }

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

    function masukkanData($db, $id_customer, $posisi_awal, $posisi_akhir, $id_driver, $tanggal, $rating, $comment){
        $sql = "insert into history(ID_Cust, Source, Dest, ID_Driver, Order_Date, Rating, Comment, HidDriver, HidCust) values('$id_customer', '$posisi_awal', '$posisi_akhir', '$id_driver', '$tanggal', '$rating', '$comment', 0, 0)";
        mysqli_query($db, $sql);
    }
    $db = connectTOSQL();
    $id_customer=$_SESSION['id_active'];
    $posisi_awal=$_SESSION['posisi_asal'];
    $posisi_akhir=$_SESSION['posisi_akhir'];
    $id_driver=$_SESSION['id_driver'];
    $tanggal=date("Y-m-d");
    $rating=get_rating();
    $comment=$_GET['comment'];

    echo $id_customer."<br>";
    echo $posisi_awal."<br>";
    echo $posisi_akhir."<br>";
    echo $id_driver."<br>";
    echo $tanggal."<br>";
    echo $rating."<br>";
    echo $comment."<br>";
    masukkanData($db, $id_customer, $posisi_awal, $posisi_akhir, $id_driver, $tanggal, $rating, $comment);
    header("Location: ../front-end/riwayat.php?id_active=".$id_customer);
?>