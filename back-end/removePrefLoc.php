<?php
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id = $_GET['id'];
        $loc = $_GET['loc'];
        $db = connectTOSQL();

        $usernamesql = "DELETE FROM pref_location where ID = '$id' and Location = '$loc'";
        $username_result = mysqli_query($db, $usernamesql);
        connectTOSQL();
        $str = 'Location: ../front-end/editPrefLoc.php?id_active=' .$id;
        header($str);
        exit();
?>