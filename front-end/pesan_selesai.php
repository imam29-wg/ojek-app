<?php include "../back-end/profil.php"?>

<html lang="en">
<head>
    <link rel="icon" type="image/png" href="../gambar/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../gambar/favicon-16x16.png" sizes="16x16" />
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
        <div id="username"> Hai, <?php echo $final_object['Name'] ?> </div>
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

    <?php
        if (!isset($_SESSION)){
            session_start();
        }
        $posisi_asal=$_SESSION['posisi_asal'];
        $posisi_akhir=$_SESSION['posisi_akhir'];
        $pref_driver=$_SESSION['pref_driver'];
        $_SESSION['id_active']=$_GET['id_active'];
        $_SESSION['id_driver']=$_GET['id_driver'];
        $db = connectTOSQL();
        $foto_driver_q = 'SELECT * FROM profil WHERE ID = "' .$_SESSION['id_driver'] .'"';
        $foto_driver_res = mysqli_query($db,$foto_driver_q);
        $foto_driver_hasil = mysqli_fetch_array($foto_driver_res, MYSQLI_ASSOC);
    ?>

<div id="kesan_supir">
    <div id="gambar_supir">
        <img src="<?php echo $foto_driver_hasil['foto'] ?>" height="175px" width="175px"></div>
    <div id="username_supir">@<?php echo $foto_driver_hasil['Username'] ?></div>
    <div id="nama_supir"><?php echo $foto_driver_hasil['Name'] ?></div>
    <div id="penilaian_rating">
        <form action=<?php echo "../back-end/pesan_selesai.php?" ?> method="get" name="rating" onsubmit="return IsEmpty();">
            <input type="hidden" name = "id_active" value = <?php echo $id ?> >
            <div id="bnt_1">&#8902</div> <input title="" type="radio" name="bintang" value="bintang_1">1
            <div id="bnt_2">&#8902</div> <input title="" type="radio" name="bintang" value="bintang_2">2
            <div id="bnt_3">&#8902</div> <input title="" type="radio" name="bintang" value="bintang_3">3
            <div id="bnt_4">&#8902</div> <input title="" type="radio" name="bintang" value="bintang_4">4
            <div id="bnt_5">&#8902</div> <input title="" type="radio" name="bintang" value="bintang_5" checked>5 <br>
            <input id="komentar_supir" type="text" title="comment" name="comment" placeholder="Your Comment">
            <input type="submit" id="complete_order" value="COMPLETE ORDER">
        </form>
    </div>

<script type="text/javascript">
        
        function IsEmpty(){
          if(document.forms['rating'].comment.value === "")
          {
            alert("Input is empty");
            return false;
          }
            return true;
            
        }
        
</script>

</body>
</html>
