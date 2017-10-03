<?php
    // Fungsi untuk menghubungkan ke MySQL
    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }

    // Fungsi untuk memvalidasi username dan password user
    function validasiLogin($db, $username, $password){
        $sql = "select ID from profil where Username = '$username' and Password = '$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id = $row['ID'];
        $count = mysqli_num_rows($result);
        if ($count == 1){
            $_SESSION['login_user'] = $id;
            $_SESSION['username'] = $username;
            $isdriversql = "select Driver from profil where ID = '$id'";
            $driver_result = mysqli_query($db, $isdriversql);
            $driver_row = mysqli_fetch_arra            $driver = $driver_row['Driver'];
y($driver_result, MYSQLI_ASSOC);
            if ($driver == 1){
                header("Location: ../front-end/profil.html?id_active=$id");
            }
            else {
                header("Location: ../front-end/pesan.html?id_active=$id");
            }

            die();
        }
        else{
            header("Location: ../front-end/gagal.html");
            die();
        }
    }
    
    session_start();
    $db = connectTOSQL();
    $username = $_POST['username'];
    $password = $_POST['password'];
    validasiLogin($db, $username, $password);
?>

