<?php
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id = $_GET["id_active"];
        $db = connectTOSQL();
        $prefLocsql = "select Location from pref_location where ID = '$id'";
        $prefLoc_result = mysqli_query($db, $prefLocsql);

?>