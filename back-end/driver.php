<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    function connectSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }   
    $_SESSION['posisi_asal'] = $_GET['pick_point'];
    $_SESSION['posisi_akhir'] = $_GET['destination'];
    $_SESSION['pref_driver'] = $_GET['pref_driver'];

    $pref_ids = array();
    $other_ids = array();


    $pref_ids = array();
    $other_ids = array();


    $db = connectSQL();
    $prefsql = 'select ID from profil where Driver = 1 and Name like "' . $_SESSION['pref_driver'] . '"';
    $pref_result = mysqli_query($db, $prefsql);

    while ($row = mysqli_fetch_row($pref_result)) { 
        array_push($pref_ids, $row[0]);
    }

    $othersql = 'select ID from profil where Driver = 1 and Name not like "' . $_SESSION['pref_driver'] . '"';
    $other_result = mysqli_query($db, $othersql);

    while ($row = mysqli_fetch_row($other_result)) { 
        array_push($other_ids, $row[0]);
    }

    mysqli_close($db);

    function showDriver($driver_id, $prefer) {
        $db = connectSQL();
        $usersql = 'select * from profil natural join pref_location where ID = "' .$driver_id .'" and (Location like "' .$_SESSION['posisi_asal'] .'" or Location like "' .$_SESSION['posisi_akhir'] .'")';
        $user_result = mysqli_query($db, $usersql);
        
        if (mysqli_num_rows($user_result) > 0){
            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);
        $username = $user_row['Username'];
        $driver = $user_row['Driver'];

        $data_driver = array("Name" => $user_row['Name'], "Username" => $user_row['Username'], "Email" => $user_row['Email'], "Phone" => $user_row['Phone'], "Driver" => $user_row['Driver'], "Foto" => $user_row['foto']);

        // echo $user_row['Name'] . " " . $user_row['Username'] . " " . $user_row['Email'] . " " . $user_row['Phone'] . " " . $user_row['Driver'] . " " . $user_row['foto'] . " ";

        //menghitung rating
        if($driver[0] == 1) {
            $driversql = "select ID_Driver,avg(Rating),count(Rating) from history where ID_Driver = '$driver_id' group by ID_Driver";
            $driver_result = mysqli_query($db, $driversql);
            $driver_rating_row = mysqli_fetch_array($driver_result, MYSQLI_ASSOC);
            $driver_avg_rating = $driver_rating_row['avg(Rating)'];
            $driver_vote = $driver_rating_row['count(Rating)'];

            $driversql = "select Location from pref_location where ID = '$driver_id'";
            $driver_result = mysqli_query($db, $driversql);
            $driver_location_row = mysqli_fetch_array($driver_result, MYSQLI_ASSOC);
            $driver_location = $driver_location_row['Location'];   
            
            $data_driver['avg_rating'] = $driver_avg_rating;
            $data_driver['vote'] = $driver_vote;
            
            $location = array();
            foreach(array($driver_location) as $value) {
                array_push($location, $value);
            }
            $data_driver['location'] = $location;

            $prefLocsql = "select Location from pref_location where ID = '$driver_id'";
            $prefLoc_result = mysqli_query($db, $prefLocsql);
            
        }
        mysqli_close($db);

        echo "<div class= 'supir'>";

        if($prefer == 0){
            echo "<h2>OTHER DRIVERS:</h2>";
        } else {
            echo "<h2>PREFERED DRIVERS:</h2>";
        }

        echo '<div class="gambar_supir"><img src=' . $data_driver['Foto'] . ' height="100px" width="100px"></div>';
        echo '<div class="identitas_supir">';
        echo  '<div class="nama_supir">' . $data_driver['Name'] . '</div>';
        echo '<div class="rating"> &#9734 '. $data_driver['avg_rating'] .'</div><div class="votes"> ('. $data_driver['vote'] .'votes)</div>';
        echo '<form action="pesan_selesai.php" method="get">';
        echo '<input type="hidden" name = "id_active" value =' . $_SESSION['login_user'] . '>';
        echo '<input type="hidden" name = "id_driver" value =' . $driver_id . '>';
        echo '<input class="pesan_supir_submit button_green" type="submit" value="CHOOSE ME">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    }
?>