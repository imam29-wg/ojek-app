<html>
<title>Edit Preference Location</title>
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
            <div id="username"></div>
            <a href="login.html">Logout</a>
        </div>
    </div>

    <div id="nav_tab">

        <?php
        $id = $_GET["id_active"];
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

    <div class="page_title">Edit Preference Location</div>
    
    <div class="tabel_prefloc">
    <table id="prefLoc">
        <tr>
            <td> NO </td>
            <td> LOCATION </td>
            <td> ACTION </td>
        </tr>
    

    <?php
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id = $_GET["id_active"];
        $db = connectTOSQL();
        $prefLocsql = "select Location from pref_location where ID = '$id'";
        $prefLoc_result = mysqli_query($db, $prefLocsql);
        //$prefLocArray = mysqli_fetch_array($prefLoc_result, MYSQLI_ASSOC);
        
        $count = 0;

        while ($row = mysqli_fetch_row($prefLoc_result)) {
            $count = $count + 1;
            echo "<tr>";
            echo "<td> $count </td>";
            echo "<td> $row[0] </td>";
            echo '<td>  <div class="pena">
            <img src="../gambar/pena.png">
         <a onclick="removePrefLoc('.$id.',\''.$row[0].'\')"> <img src="../gambar/cross_icon.png" height="20px" width="20px"> </a></div> ';
            echo "</tr>";

        }
    ?>



</table>
</div>
<script type="text/javascript">
    function removePrefLoc(id, loc) {
        var result = confirm("Want to delete?");
        if (result) {
            var xmlhttp;
            if (window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            loc.replace(/ /g,"+") 
            xmlhttp.open("GET","../back-end/removePrefLoc.php?id="+id+"&loc="+loc,false);
            xmlhttp.send();
            location.reload(true);
            location.reload(true);
            location.reload(true);
            window.location.reload(true);
            // ubah di current
            // document.getElementById("prefLoc").deleteRow(id);

        }
    }

</script>

<script type="text/javascript" src="displayUsername.js"></script>

    <div class="page_subtitle">Add New Location</div>
    <div class="add_form">
    <form name="add" action="../back-end/addPrefLoc.php" method="post" onsubmit="return IsEmpty();" >
        <input class="entry" title="" type="text" name="loc" value="" size="30">
        <input class="button_green" title="" type="submit" value="ADD">
        <?php $id = $_GET["id_active"]; echo "<input type=\"hidden\" name=\"id\" value=$id>"; ?>
    </form>
    </div>

    <script type="text/javascript">
        function IsEmpty(){
          if(document.forms['add'].loc.value === "")
          {
            alert("Input is empty");
            return false;
          }
            return true;
        }
    </script>
</body>
</html>