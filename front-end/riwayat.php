<html>
<?php include "../back-end/profil.php" ?>
<title>Transaction History</title>
<head>
    <link rel="icon" type="image/png" href="../gambar/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../gambar/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div id="header">
        <div id="company">
            <div id="name"><span class="hijau">PR</span>-<span class="merah">OJEK</span></div>
            <div id="tagline">wush... wush... ngeeeeeeeenggg... </div>
        </div>
        <div id="userid">
            <div id="username"> Hai, <?php echo $final_object['Name'] ?> </div>
            <a href="login.html">Logout</a>
        </div>
    </div>

    <div id="nav_tab">

        <?php
        $id = $_SESSION["login_user"];
        echo'
        <table>
            <tr>
                <td> <a href="pesan.php?id_active=' .$id .'">ORDER</a> </td>
                <td class="selected"> <a href="riwayat.php?id_active=' .$id .'">HISTORY</a> </td>
                <td> <a href="profil.php?id_active=' .$id .'">MY PROFILE</a> </td>
            </tr>
        </table>';

    ?>
    </div>

    <div class="page_title">TRANSACTION HISTORY</div>

    <div id="history_tab">

    <?php
        echo'
        <table>
            <tr>
                <td class="selected"> MY PREVIOUS ORDER </td>
                <td><a href="riwayat_supir.php?id_active=' .$id .'"> DRIVER HISTORY </a></td>
            </tr>
        </table>';

    ?>
    
    </div>
    <br>
    <?php
        $db = connectTOSQL();
        $prefLocsql = "select * from history where ID_Cust = '$id'";
        $prefLoc_result = mysqli_query($db, $prefLocsql);
        //$prefLocArray = mysqli_fetch_array($prefLoc_result, MYSQLI_ASSOC);
        
        $count = 0;

        while ($row = mysqli_fetch_row($prefLoc_result)) {
        	$count = $count + 1;
            if($row[8] != 1){
        	echo '	<div class="tabel_riwayat" id="history_' .$count .'">
        			<table>
        			<tr>
        				<td rowspan="2" class="cell_profpic">
        					<img src= '; echo $final_object['Foto'];
            echo '>
        				</td>
           				<td>
                            <span class="tanggal_riwayat">';
            $date = new DateTime($row[4]);
            echo date_format($date,"l, F jS Y");
            echo '</span><br><b>';
            $namaOjek = "select Name from profil where ID = $row[3]";
            $namaOjekRes = mysqli_query($db,$namaOjek);
            $namaOjekHasil = mysqli_fetch_row($namaOjekRes);
            echo "$namaOjekHasil[0] </b> <br>";
            echo "$row[1] -> $row[2]";
            echo '</td>';
            echo '<td><form action="../back-end/hidHistory.php" method="post">';
            echo '<input type="hidden" name="order_id" value="'.$row[9].'">';
            echo '<input type="hidden" name="id_req" value="'.$id.'">';
            echo '<input type="hidden" name="driver_hide" value="0">';
            echo '<input class="button_red" type="submit" value="HIDE">';
            echo '</form></td>';
            echo "</tr>";
            echo '<tr>';
            echo '<td colspan="2">';
            echo 'You rated: ';
            echo '<span class="star_gold">';
            for($counter = 0; $counter < $row[5]; $counter++){
                echo '&#x2606';
            }
            echo '</span> <br>You Commented: ' .$row[6] ;
            echo '</td>';
            echo '</tr>';
        	echo '</table><br></div>';
        }
        }
    ?>


<script type="text/javascript">
    function remove(id) {
    	var rem = document.getElementById("history_"+ id );
    	rem.parentNode.removeChild(rem);
    }
</script>

</body>
</html>