<?php include "../back-end/profil.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="pesan.css">
</head>
<title>Pesan</title>
<body>
<div id="header">
    <div id="company">
        <div id="name"><span class="hijau">PR</span>-<span class="merah">OJEK</span></div>
        <div id="tagline">wush... wush... ngeeeeeeeenggg... </div>
    </div>
    <div id="userid">
        <div id="username">Hai, huahahehe</div>
        <a href="login.html">Logout</a>
    </div>
</div>

<div id="nav_tab">
    <table>
        <tr>
            <td class="selected"> <a href="#">ORDER</a> </td>
            <td> <a href=<?php echo"riwayat.php?id_active=".$id?>>HISTORY</a> </td>
            <td> <a href=<?php echo"profil.php?id_active=".$id?>>MY PROFILE</a> </td>
        </tr>
    </table>
</div>

<div class="page_title">MAKE AN ORDER</div>
<div id="langkah_order">
    <div class="pilih_selected">
        <div class="order_number">1</div>
        <div class="order_name">Select Destination</div>
    </div>
    <div class="pilih_unselected">
        <div class="order_number">2</div>
        <div class="order_name">Select a Driver</div>
    </div>
    <div class="pilih_unselected">
        <div class="order_number">3</div>
        <div class="order_name">Complete your order</div>
    </div>
</div> <br>
<form action= <?php echo "pesan_supir.php?" ?> method="get" >
    <input type="hidden" name = "id_active" value = <?php echo $id ?> >
        <div class="form_destinasi">
        <div class="atribut_form_destinasi">Picking point</div>
        <div class="input_form_destinasi"><input name="pick_point" id="pick_point" title="pick_driver" type="text"></div><br>
    </div>
    <div class="form_destinasi">
        <div class="atribut_form_destinasi">Destination</div>
        <div class="input_form_destinasi"><input name="destination" id="destination" title="destination" type="text"></div><br>
    </div>
    <div class="form_destinasi">
        <div class="atribut_form_destinasi">Preferred Driver</div>
        <div class="input_form_destinasi"><input name="pref_driver" id="pref_driver" title="pref_driver" type="text"><br></div>
    </div>
    <input id="submit_button_destinasi" type="submit" value="NEXT">
</form>

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
