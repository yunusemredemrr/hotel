<?php
include("connection_database.php");
$dogrumu = false;

if (isset($_GET["uye"])) {
    $kadi = $_GET["uye"];

    $sql1 = mysqli_query($baglanti, "select * from uye WHERE kadi='$kadi'");
    $sonuc1 = mysqli_fetch_assoc($sql1);
    $adi = $sonuc1["ad"];
    $soyadi = $sonuc1["soyad"];

    $tcno = $sonuc1["tcno"];

    $sql2 = mysqli_query($baglanti, "select * from fatura WHERE tcno='$tcno'");


} else {


}

if (empty($tcno)) {


    include("member_header.php");

    echo "MEVCUT FATURANIZ YOKTUR";
} else {
    include("member_header.php");

    while ($sonuc2 = mysqli_fetch_assoc($sql2)) {


        $adi = $sonuc2["ad"];
        $soyadi = $sonuc2["soyad"];
        $tcno = $sonuc2["tcno"];
        $firma = $sonuc2["firmaadi"];
        $odafiyat = $sonuc2["fiyat"];
        $adres = $sonuc2["adres"];
        $odanumara = $sonuc2["odanumarasi"];
        $tarih = $sonuc2["tarih"];
        $tarih = explode("-", $tarih);
        $yil = $tarih[0];
        $ay = $tarih[1];
        $gun = $tarih[2];


        ?>

        <h1 align="center">E FATURA</h1>
        </br>
        <form method="post">
            <table border="2" width="500" height="500" align="center" valign="center">


                <tr>
                    <td colspan="3" align="center">A OTELİ</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>TC NO : <?= $tcno ?></p>
                        <p>MÜŞTERİ : <?= $adi . " " . $soyadi ?></p>
                    </td>
                    <td>TARİH : <?= $gun . "-" . $ay . "-" . $yil; ?></td>
                </tr>
                <tr>
                    <td colspan="2">ODA NUMARASI : <?= $odanumara ?></td>
                    <td>FİYATI : <?= $odafiyat ?> TL</td>
                </tr>

                <tr>
                    <td colspan="3" align="center">ADRES </br> <?= $adres ?> </td>
                </tr>


            </table>
        </form>
    <?php }
} ?>