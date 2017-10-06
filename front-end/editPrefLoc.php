<html>

<?php include "../back-end/profil.php"
?>

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
            <div id="username"> Hai, <?php echo $final_object['Name'] ?> </div>
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
                <td> <a href="riwayat.php?id_active=' .$id .'">HISTORY</a> </td>
                <td class="selected"> <a href="profil.php?id_active=' .$id .'">MY PROFILE</a> </td>
            </tr>
        </table>';

    ?>
    </div>

    <div class="page_title">Edit Preference Location</div>
    
    
    <div class="tabel_prefloc">
    <table id="prefLoc">
        <tr>
            <td> NO </td>
            <td> <span class="edit_name"> LOCATION </span> <span class="pena"> ACTION </span></td>
        </tr>
    

    <?php
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
            echo '<td> <form name="editremove" method="post" action="../back-end/editPrefLoc.php"> <span class="edit_name" id="edit_' .$count .'">'.$row[0] .'</span><input type="hidden" id="inp_' .$count .'" name="locnew" value="">';
            echo '<span class="pena">
            <input type="hidden" name="id" value="'.$id.'">
            <input type="hidden" name="loc" value="'.$row[0].'">
            <input type="hidden" id="disket_' .$count .'" src="../gambar/disket.png" alt="Submit" width="30px" height="30px" name="action" value="update">
            <a id="pena_' .$count .'"href="#" onclick="changetoedit('.$count.')"> <img src="../gambar/pena.png"> </a>
            &nbsp &nbsp &nbsp &nbsp
            <input type="image" src="../gambar/cross_icon.png" alt="Submit" width="30px" height="30px" name="action" value="remove"> </a></div></form></td> ';
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
            window.location.reload(true);
            // ubah di current
            // document.getElementById("prefLoc").deleteRow(id);

        }
    }

</script>

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

        function changetoedit(id){
            document.getElementById("edit_"+id).innerHTML = "";
            document.getElementById("inp_"+id).type = "text";
            document.getElementById("disket_"+id).type = "image";
            var x = document.getElementById("pena_"+id);
            x.parentNode.removeChild(x);
        }

        function myFunction() {
            
        }
    </script>
</body>
</html>