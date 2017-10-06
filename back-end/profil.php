    <?php
        session_start();
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }   
        $id = 1;
        $db = connectTOSQL();
        $usersql = "select * from profil where ID = '$id'";
        $user_result = mysqli_query($db, $usersql);
        $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);
        $username = $user_row['Username'];
        $driver = $user_row['Driver'];

        $final_object = array("Name" => $user_row['Name'], "Username" => $user_row['Username'], "Email" => $user_row['Email'], "Phone" => $user_row['Phone'], "Driver" => $user_row['Driver'], "Foto" => $user_row['foto']);

        // echo $user_row['Name'] . " " . $user_row['Username'] . " " . $user_row['Email'] . " " . $user_row['Phone'] . " " . $user_row['Driver'] . " " . $user_row['foto'] . " ";

        //menghitung rating
        if($driver[0] == 1) {
            $driversql = "select ID_Driver,avg(Rating),count(Rating) from history where ID_Driver = '$id' group by ID_Driver";
            $driver_result = mysqli_query($db, $driversql);
            $driver_rating_row = mysqli_fetch_array($driver_result, MYSQLI_ASSOC);
            $driver_avg_rating = $driver_rating_row['avg(Rating)'];
            $driver_vote = $driver_rating_row['count(Rating)'];

            $driversql = "select Location from pref_location where ID = '$id'";
            $driver_result = mysqli_query($db, $driversql);
            $driver_location_row = mysqli_fetch_array($driver_result, MYSQLI_ASSOC);
            $driver_location = $driver_location_row['Location'];   
            
            $final_object['avg_rating'] = $driver_avg_rating;
            $final_object['vote'] = $driver_vote;
            
            $location = array();
            foreach(array($driver_location) as $value) {
                array_push($location, $value);
            }

        }
        mysqli_close($db);
    ?>