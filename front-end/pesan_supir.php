<?php include "../back-end/driver.php"?>
<?php include "../back-end/profil.php"?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="../gambar/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../gambar/favicon-16x16.png" sizes="16x16" />
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
        <div id="username"> Hai, <?php echo $final_object['Name'] ?> </div>
        <a href="login.html">Logout</a>
    </div>
</div>

<div id="nav_tab">
    <table>
        <tr>
            <td class="selected"> <a href="#">ORDER</a> </td>
            <td> <a href=<?php echo"riwayat.php?id_active=".$_SESSION['login_user']?> >HISTORY</a> </td>
            <td> <a href=<?php echo"profil.php?id_active=".$_SESSION['login_user'] ?> >MY PROFILE</a> </td>
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
        <?php  
            echo '<div class="supir_pilihan">';
            foreach($pref_ids as $id) {
                showDriver($id, 1);
            }
            echo '</div>'
        ?>
    <br><br>

        <?php  
            echo '<div class="supir_lainnya">';
            foreach($other_ids as $id) {
                showDriver($id, 0);
            }
            echo '</div>'
        ?>
</body>
</html>
