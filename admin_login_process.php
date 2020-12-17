<?php

include("connection_database.php");
ob_start();
session_start();

if (!empty($_POST)) {
    $yoneticiadi = $_POST['yoneticiadi'];
    $sifre = $_POST['sifre'];

    $yoneticiadi = stripslashes($yoneticiadi);
    $sifre = stripslashes($sifre);
    $yoneticiadi = mysqli_real_escape_string($baglanti, $yoneticiadi);
    $sifre = mysqli_real_escape_string($baglanti, $sifre);
    $sql = "SELECT * FROM yonetici WHERE yoneticiadi='$yoneticiadi' and sifre='$sifre'";
    $result = mysqli_query($baglanti, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $yoneticiadi;
        $_SESSION["pass"] = $sifre;
        header("Location:admin.php?yonetici=$yoneticiadi");
    } else {
        echo "</br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .
            "Kullanici Adi/Sifre Yanlis.";

        include("index.php");


    }
}else{
    $yoneticiadi = "";
    $sifre = "";

    $yoneticiadi = stripslashes($yoneticiadi);
    $sifre = stripslashes($sifre);
    $yoneticiadi = mysqli_real_escape_string($baglanti, $yoneticiadi);
    $sifre = mysqli_real_escape_string($baglanti, $sifre);
    $sql = "SELECT * FROM yonetici WHERE yoneticiadi='$yoneticiadi' and sifre='$sifre'";
    $result = mysqli_query($baglanti, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $yoneticiadi;
        $_SESSION["pass"] = $sifre;
        header("Location:admin.php");
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