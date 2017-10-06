<?php include "../back-end/profil.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="edit_profile.css">
</head>
<title>Edit Profile</title>
<body>
<h2>EDIT PROFILE INFORMATION</h2>

<form action="../back-end/edit_profile.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_active" value=<?php echo $id ?>>
    <div id="profile_picture">
        <img id="gambar" src= <?php echo $final_object['Foto'] ?> height="200px" width="200px">
        Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    Your Name <input type="text" title="nama" name="nama"><br>
    Phone <input type="text" title="telpon" name="telpon"><br>
    Status Driver :  <img src="../gambar/toggle_yes.png" height="20px" width="40px"> <br><br>

    
    <input class = "next_action" id = "save" type="submit" value="SAVE" name="save"><br>
    
</form>


<form action="profil.php" method="get">
    <input type="hidden" name="id_active" value=<?php echo $id ?>>
    <input class = "next_action" id = "back" type="submit" value="BACK" ><br>
</form>

</body>
</html>
