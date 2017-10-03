<html>
<title>Edit Preference Location</title>
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
            <div id="username">Hai, huahahehe </div>
            <a href="logout.html">Logout</a>
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

    <div class="page_subtitle">
        PREFERRED LOCATIONS:
        <div class="pena">
            <img src="../gambar/pena.png">
        </div>
    </div>
    <div class="page_title">Edit Preference Location</div>
    

    <table border="1">
        <tr>
            <td> NO </td>
            <td> LOCATION </td>
            <td> ACTION </td>
        </tr>
    

    <?php
        session_start();
        function connectTOSQL(){
            return mysqli_connect("localhost", "root", "", "ojek");
        }
        $id = $_SESSION["login_user"];
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
            echo "<td> <a href=\"#\" onclick=\"removePrefLoc($id,'$row[0]')\"> <img src=\"../gambar/cross_icon.png\" height=\"20px\" width=\"20px\"> </a>";
            echo "</tr>";

        }
    ?>



</table>

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
            xmlhttp.open("GET","../back-end/removePrefLoc.php?id="+id+"&loc="+loc,true);
            xmlhttp.send();
            location.reload(true);
        }
        
    }

</script>

<script type="text/javascript">
    var header = document.getElementsById("username");
    // ambil data
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    loc.replace(/ /g,"+") 
    xmlhttp.open("GET","../back-end/removePrefLoc.php?id="+id+"&loc="+loc,true);
    xmlhttp.send();


</script>
    <div class="page_subtitle">Add New Location</div>
    <form action="../back-end/addPrefLoc.php" method="post" >
        <input title="" type="text" name="loc" value="" size="30"> <br>
        <input class="button_green" title="" type="submit" value="ADD">
        <?php $id = $_SESSION["login_user"]; echo "<input type=\"hidden\" name=\"id\" value=$id>"; ?>
    </form>
</body>
</html>