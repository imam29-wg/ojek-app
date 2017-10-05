<html>
<title>Transaction History</title>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div id="header">
        <div id="company">
            <div id="name">PR-OJEK</div>
            <div id="tagline">wush... wush... ngeeeeeeeenggg... </div>
        </div>
        <div id="userid">
            <div id="username"></div>
            <a href="login.html">Logout</a>
        </div>
    </div>

    <div id="nav_tab">
        <table>
            <tr>
                <td> <a href="pesan.html">ORDER</a> </td>
                <td> <a href="riwayat.html">HISTORY</a> </td>
                <td class="selected"> <a href="#">MY PROFILE</a> </td>
            </tr>
        </table>
    </div>

    <div class="page_title">TRANSACTION HISTORY</div>

    <div id="history_tab">

	    <table>
	        <tr>
	            <td class="selected"> MY PREVIOUS ORDER </td>
	            <td> DRIVER HISTORY </td>
	        </tr>
	    </table>
    
    </div>
    <?php
        session_start();
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id = $_GET["id_active"];
        $db = connectTOSQL();
        $prefLocsql = "select * from history where ID_Cust = '$id'";
        $prefLoc_result = mysqli_query($db, $prefLocsql);
        //$prefLocArray = mysqli_fetch_array($prefLoc_result, MYSQLI_ASSOC);
        
        $count = 0;

        while ($row = mysqli_fetch_row($prefLoc_result)) {
        	$count = $count + 1;

        	echo '	<div class="tabel_riwayat" id="history_' .$count .'">
        			<table>
        			<tr>
        				<td rowspan="2" class="cell_profpic">
        					<img src="../gambar/profil_' .$row[3] .'.png">
        				</td>
           				<td>';
            $date = new DateTime($row[4]);
            echo date_format($date,"l, F jS Y");
            echo '<br><b>';
            $namaOjek = "select Name from profil where ID = $row[3]";
            $namaOjekRes = mysqli_query($db,$namaOjek);
            $namaOjekHasil = mysqli_fetch_row($namaOjekRes);
            echo "$namaOjekHasil[0] </b> <br>";
            echo "$row[1] -> $row[2]";
            echo '</td>';
            echo '<td>';
            echo '<button class="button_red" onclick="remove(' .$count .') > REMOVE </button>';
            echo '</td>';
            echo "</tr>";
            echo '<tr>';
            echo '<td colspan="2">';
            echo 'You rated: ' .$row[5] .'/5 <br>You Commented: ' .$row[6] ;
            echo '</td>';
            echo '</tr>';
        	echo '</table></div><br>';
        }
    ?>


<script type="text/javascript">
    function remove(id) {
    	var rem = document.getElementById("history_"+ id );
    	rem.parentNode.removeChild(rem);
    }
</script>

<script type="text/javascript" src="displayUsername.js"></script>

</body>
</html>