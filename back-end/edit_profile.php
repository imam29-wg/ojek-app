<?php
    session_start();

    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }

    $target_dir = "../gambar/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.\n";
            $uploadOk = 0;
        }
    }

    // if everything is ok, try to upload file
     else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.\n";
        } else {
            echo "Sorry, there was an error uploading your file.\n";
        }
    }

    $nama = $_POST['nama'];

    $telepon = $_POST['telpon'];

    $db = connectTOSQL();
    $id = $_SESSION['login_user'];

    if ($nama != "" ) {
        //$usersql = "update profil set Name = '$nama', Phone ='$telepon', foto = '$target_file' where ID = '$id' ";
        $usersql = "update profil set Name = '$nama' where ID = '$id' ";        
        mysqli_query($db, $usersql);
    } 

    if ($telepon != "") {
        $usersql = "update profil set Phone ='$telepon' where ID = '$id' ";
        mysqli_query($db, $usersql);
    }

    if ($target_file != "") {
        $usersql = "update profil set foto ='$target_file' where ID = '$id' ";
        mysqli_query($db, $usersql);
    }

    mysqli_close($db);

    $db = connectTOSQL();
    $id = $_SESSION['login_user'];
    // $usersql = "update profil set Name = '$nama', Phone ='$telepon', foto = '$target_file' where ID = '$id' ";
    if(isset($_POST['isdriver'])) {
        $usersql = "update profil set Driver = 1 where ID = '$id' ";
        mysqli_query($db, $usersql);
    } else {
        $usersql = "update profil set Driver = 0 where ID = '$id' ";
        mysqli_query($db, $usersql);
    }
    
    mysqli_close($db);
    
  
    header("Location: ../front-end/profil.php?id_active=".$id);
?>