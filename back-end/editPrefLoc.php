<?php
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id = $_POST['id'];
        $loc = $_POST['loc'];
        $locnew = $_POST['locnew'];
        $db = connectTOSQL();
        if ($_POST['action'] == 'remove'){
            $usernamesql = "DELETE FROM pref_location where ID = '$id' and Location = '$loc'";    
        } else {
            $usernamesql = "UPDATE pref_location SET Location = '$locnew' where ID = '$id' and Location = '$loc'";
        }
        $username_result = mysqli_query($db, $usernamesql);
        connectTOSQL();
        $str = 'Location: ../front-end/editPrefLoc.php?id_active=' .$id;
        header($str);
        exit();
?>