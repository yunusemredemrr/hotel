<?php
include("connection_database.php");
session_start();
if (empty($_SESSION['logged'])) {
    header("Location:index.php");
} else {
    if (isset($_GET["uye"])) {
        $kadi = $_GET["uye"];
        $sql = mysqli_query($baglanti, "select * from uye WHERE kadi='$kadi'");

        $sonuc = mysqli_fetch_assoc($sql);

        $adi = $sonuc["ad"];
        $soyadi = $sonuc["soyad"];

    }else{
        $kadi="";
        $adi = "";
        $soyadi = "";
    }
    $sorgu = mysqli_query($baglanti, "select * from uye where kadi = '$kadi'");
    $row = mysqli_fetch_assoc($sorgu);
    $ID=$row["id"];
    include("member_header.php");
    ?>

    </br>



            <td colspan="3">
                <?php

                if (empty($_GET['sayfa'])) {
                    $bos = "";
                } else {
                    $bos = $_GET['sayfa'];
                }

                if ($bos == "odalar") {
                    header("Location:rooms_available.php?id='$ID'");
                }elseif ($bos == "bilgiler") {
                    header("Location:member_registration.php?id='$ID'");
                }elseif ($bos == "rezerveodam") {
                    header("Location:my_room.php?id='$ID'");
                }elseif ($bos == "faturalarım") {
                    header("Location:my_invoice.php?uye=$kadi");
                }


                ?>
            </td>


    <?php
}
?>