<?php
        session_start();
        $id = $_SESSION["login_user"];
        $db = mysqli_connect("localhost", "root", "", "ojek");
        $prefLocsql = "select Location from pref_location where ID = '$id'";
        $prefLoc_result = mysqli_query($db, $prefLocsql);
?>