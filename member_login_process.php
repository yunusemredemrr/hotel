<?php

include("connection_database.php");
ob_start();
session_start();
if(!empty($_POST)) {
    $kadi = $_POST['kadi'];
    $sifre = $_POST['sifre'];

    $kadi = stripslashes($kadi);
    $sifre = stripslashes($sifre);
    $kadi = mysqli_real_escape_string($baglanti, $kadi);
    $sifre = mysqli_real_escape_string($baglanti, $sifre);
    $sql = "SELECT * FROM uye  WHERE kadi='$kadi' and sifre='$sifre'";
    $result = mysqli_query($baglanti, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $kadi;
        $_SESSION["pass"] = $sifre;
        header("Location:member.php?uye=$kadi");
    } else {
        echo "</br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .
            "Kullanici Adi/Sifre Yanlis.";
        include("index.php");


    }
}else{
    $kadi = "";
    $sifre = "";

    $kadi = stripslashes($kadi);
    $sifre = stripslashes($sifre);
    $kadi = mysqli_real_escape_string($baglanti, $kadi);
    $sifre = mysqli_real_escape_string($baglanti, $sifre);
    $sql = "SELECT * FROM uye  WHERE kadi='$kadi' and sifre='$sifre'";
    $result = mysqli_query($baglanti, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $kadi;
        $_SESSION["pass"] = $sifre;
        header("Location:member.php?uye=$kadi");
    } else {
        echo "</br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;,&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .
            "Değer Girilmedi!!!!.";
        include("index.php");


    }
}
ob_end_flush();
?>
