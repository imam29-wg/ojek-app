<?php include "../back-end/profil.php"?>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="edit_profile.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="../gambar/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../gambar/favicon-16x16.png" sizes="16x16" />    
</head>
<title>Edit Profile</title>
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
            <td> <a href=<?php echo"pesan.php?id_active=".$id?>>ORDER</a> </td>
            <td> <a href=<?php echo"riwayat.php?id_active=".$id?>>HISTORY</a> </td>
            <td class="selected"> <a href="#">MY PROFILE</a> </td>
        </tr>
    </table>
</div>
<div class="page_title">EDIT PROFILE INFORMATION</div>


<<<<<<< HEAD
<form action=<?php echo "../back-end/edit_profile.php"?> method="post" enctype="multipart/form-data">
||||||| merged common ancestors
<form action=<?php echo "../back-end/edit_profile.php"?> method="get" enctype="multipart/form-data">
=======
<form action="../back-end/edit_profile.php" method="post" enctype="multipart/form-data">
>>>>>>> 261fe5bdf524e67d60f7ac376d71caf1cdc27d40
    <input type="hidden" name="id_active" value=<?php echo $id ?>>
    <div id="profile_picture">
        <table>
        <tr>
            <td>
                <img class="gambar" src= <?php echo $final_object['Foto'] ?>>
            </td>
            <td>
            <span class="inputgambar">
            Select image to upload: 
            <br><input type="file" name="fileToUpload" id="fileToUpload">
            </span>
            </td>
        </tr>
        </table>
    </div>
    Your Name <input type="text" title="nama" name="nama"><br>
    Phone <input type="text" title="telpon" name="telpon"><br>
    Status Driver :
    <label class="switch">
        <input type="checkbox" name="isdriver">
        <span class="slider round"></span>
    </label><br><br>

    
    <input class = "next_action" id = "save" type="submit" value="SAVE" name="save"><br>
    
</form>


<form action="profil.php" method="get">
    <input type="hidden" name="id_active" value=<?php echo $id ?>>
    <input class = "next_action" id = "back" type="submit" value="BACK" ><br>
</form>

</body>
</html>
