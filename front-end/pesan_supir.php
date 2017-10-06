<?php include "../back-end/profil.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="pesan_supir.css">
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
    <div class="pilih_unselected">
        <div class="order_number">1</div>
        <div class="order_name">Select Destination</div>
    </div>
    <div class="pilih_selected">
        <div class="order_number">2</div>
        <div class="order_name">Select a Driver</div>
    </div>
    <div class="pilih_unselected">
        <div class="order_number">3</div>
        <div class="order_name">Complete your order</div>
    </div>
</div> <br>
<div id="supir_pilihan">
    <div class="supir">
        <h2>PREFERRED DRIVERS:</h2>
        <div class="gambar_supir"><img src="../gambar/profil_1.png" height="100px" width="100px"></div>
        <div class="identitas_supir">
            <div class="nama_supir">pikapikachu</div>
            <div class="rating"> &#9734 4.7</div><div class="votes"> (1728 votes)</div>
            <form action="<?php echo"pesan_selesai.php?id_active=".$id?>" method="get">
                <input class="pesan_supir_submit" type="submit" value="I CHOOSE YOU">
            </form>
        </div>
    </div>
</div>
<br><br>
<div id="supir_lainnya">
    <div class="supir">
        <h2>OTHER DRIVERS:</h2>
        <div class="gambar_supir"><img src="../gambar/profil_1.png" height="100px" width="100px"></div>
        <div class="identitas_supir">
            <div class="nama_supir">pikapikachu</div>
            <div class="rating"> &#9734 4.7</div><div class="votes"> (1728 votes)</div>
            <form action="<?php echo"pesan_selesai.php?id_active=".$id?>" method="get">
                <input class="pesan_supir_submit" type="submit" value="I CHOOSE YOU">
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
    session_start();
    $_SESSION['posisi_asal'] = $_GET['pick_point'];
    $_SESSION['posisi_akhir'] = $_GET['destination'];
    $_SESSION['pref_driver'] = $_GET[''];
?>