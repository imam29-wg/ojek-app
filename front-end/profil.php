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
        <div id="name">PR-OJEK</div>
        <div id="tagline">wush... wush... ngeeeeeeeenggg... </div>
    </div>
    <div id="userid">
        <div id="username">Hai, huahahehe </div>
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

<div id="pilihan">
    <a class="order_box" href="pesan.html">ORDER</a>
    <a class="history_box" href="riwayat.html">HISTORY</a>
    <div id="profil_box">MY PROFILE</div>
</div>

<h2>My Profile <a href="edit_profile.html"><img class="pena" src="../gambar/pena.png"></a> </h2><br>
<div id="biodata">
    <img id="gambar_profil" src="../gambar/profil_1.png" height="200px" width="200px">
    <h3>@pikapikachu</h3>
    <h3>Driver | <img src="../gambar/bintang.png" height="20px" width="20px">4.7 (1,728 votes)</h3>
    <h3>pikachu@pokemonworld.net</h3>
    <h3>0899123156123</h3>
</div>
    <h2>PREFERRED LOCATIONS:<a href="editPrefLoc.html"><img class="pena" src="../gambar/pena.png"></a></h2>
    <h3>->Pewter City</h3>
    <h3>->Saffron City</h3>
    <h3>->Skypillar Tower</h3>
</body>
</html>