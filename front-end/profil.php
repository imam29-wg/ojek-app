<!DOCTYPE html>

<?php include "../back-end/profil.php"?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<title>Profil</title>
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
            <td> <a href=<?php echo 'pesan.php?id_active='.$id?>>ORDER</a> </td>
            <td> <a href=<?php echo 'riwayat.php?id_active='.$id?>>HISTORY</a> </td>
            <td class="selected"> <a href="#">MY PROFILE</a> </td>
        </tr>
    </table>
</div>

<h2>My Profile <a href=<?php echo 'edit_profile.php?id_active='.$id?>><img class="pena" src="../gambar/pena.png"></a> </h2><br>
<div id="biodata">
    <img id="gambar_profil" src= <?php echo $final_object['Foto'] ?> height="200px" width="200px">
    <h3>@p<?php echo $final_object['Username'] ?></h3>
    <h3>Driver | <img src="../gambar/bintang.png" height="20px" width="20px">4.7 (1,728 votes)</h3>
    <h3><?php echo $final_object['Email'] ?></h3>
    <h3><?php echo $final_object['Phone'] ?></h3>
</div>
    <h2>PREFERRED LOCATIONS:<a href=<?php echo 'editPrefLoc.php?id_active='.$id?>><img class="pena" src="../gambar/pena.png"></a></h2>
    <h3>->Pewter City</h3>
    <h3>->Saffron City</h3>
    <h3>->Skypillar Tower</h3>
</body>
</html>
