<?php
    session_start();

    function connectTOSQL(){
        return mysqli_connect("localhost", "root", "", "ojek");
    }

    if($_POST['back'] != NULL){
        header("Location: ../front-end/profil.html");
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
    $usersql = "update profil set Name = '$nama', Phone ='$telepon', foto = '$target_file' where ID = '$id' ";
    mysqli_query($db, $usersql);
    mysqli_close($db);

    header("Location: ../front-end/profil.html");
?>