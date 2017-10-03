<?php

	function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
    }
    $id = $_GET["id_active"];
    $db = connectTOSQL();
    $prefLocsql = "select Username from profil where ID = '$id'";
    $prefLoc_result = mysqli_query($db, $prefLocsql);
    while ($ans = mysqli_fetch_array($prefLoc_result, MYSQLI_ASSOC)) {
    	echo $ans["Username"];
    }
   	
    
?>