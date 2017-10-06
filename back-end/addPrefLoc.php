<?php
		
        function connectTOSQL(){
        	return mysqli_connect("localhost", "root", "", "ojek");
    	}
        $id = $_POST['id'];
        $loc = $_POST['loc'];
        $db = connectTOSQL();
        $usernamesql = "INSERT INTO pref_location VALUES ('$id','$loc')";
        $username_result = mysqli_query($db, $usernamesql);
        $str = 'Location: ../front-end/editPrefLoc.php?id_active=' .$id;
        header($str);
        
        //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../front-end/editPrefLoc.php?id_active=$id">';
        exit();
?>