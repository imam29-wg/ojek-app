<?php include "../back-end/profil.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="pesan.css">
    <link rel="stylesheet" type="text/css" href="pesan_selesai.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
    <div class="pilih_unselected">
        <div class="order_number">1</div>
        <div class="order_name">Select Destination</div>
    </div>
    <div class="pilih_unselected">
        <div class="order_number">2</div>
        <div class="order_name">Select a Driver</div>
    </div>
    <div class="pilih_selected">
        <div class="order_number">3</div>
        <div class="order_name">Complete your order</div>
    </div>
</div> <br>
<h2>HOW WAS IT?</h2>
<div id="kesan_supir">
    <div id="gambar_supir"><img src="../gambar/profil_1.png" height="175px" width="175px"></div>
    <div id="username_supir">@pikapikachu</div>
    <div id="nama_supir">Pikachu Smith </div>
    <div id="bnt_1">&#9734</div><div id="bnt_2">&#9734</div><div id="bnt_3">&#9734</div><div id="bnt_4">&#9734</div><div id="bnt_5">&#9734</div> <br>
</div>
<input id="komentar_supir" type="text" title="comment" name="comment" size=100% placeholder="Your Comment">
<form action=<?php echo "riwayat.php?" ?> method="get">
    <input type="hidden" name="id_active" value=<?php echo $id ?>>
    <input type="submit" value="COMPLETE ORDER">
</form>

</body>
</html>
