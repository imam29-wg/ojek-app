<?php

session_start();
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id = $_GET['id'];
        $loc = $_GET['loc'];
        $db = connectTOSQL();
        $usernamesql = "DELETE FROM pref_location where ID = '$id' and Location = '$loc'";
        echo '<script>console.log($usernamesql)</script>';
        $username_result = mysqli_query($db, $usernamesql);
        connectTOSQL();
?>