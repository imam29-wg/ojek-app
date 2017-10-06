<?php
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id_request = $_POST['id_req'];
        $order_id = $_POST['order_id'];
        $driver_hide = $_POST['driver_hide'];
       
        $db = connectTOSQL();
        if ($driver_hide == 0){
            // di cust yg di hide
            $usernamesql = "UPDATE history SET HidCust = 1 WHERE Order_Id = $order_id";
            $str = 'Location: ../front-end/riwayat.php?id_active=' .$id_request;
        } else {
            $usernamesql = "UPDATE history SET HidDriver = 1 WHERE Order_Id = $order_id";
            $str = 'Location: ../front-end/riwayat_supir.php?id_active=' .$id_request;           
        }
        $username_result = mysqli_query($db, $usernamesql);
        connectTOSQL();
        header($str);
        exit();
?>