<html>
<title>Edit Preference Location</title>
<head>

</head>
<body>



    <h1>Edit Preference Location</h1>
    

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

    <h1>Add New Location</h1>
    <form action="../back-end/addPrefLoc.php" method="post" >
        <input title="" type="text" name="loc" value="" size="30"> <br>
        <input title="" type="submit" value="ADD">
        <?php $id = $_SESSION["login_user"]; echo "<input type=\"hidden\" name=\"id\" value=$id>"; ?>
    </form>
    <iframe name="daemon" style="display:none;"></iframe>
</body>
</html>