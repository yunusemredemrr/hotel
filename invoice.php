<?php
include("connection_database.php");
$dogrumu = false;
$date=date('Y-m-d');

if (isset($_GET["uye"])) {
    $kadi = $_GET["uye"];
    $ID = $_GET["id"];
    $sql1 = mysqli_query($baglanti, "select * from uye WHERE kadi='$kadi'");
    $sql2 = mysqli_query($baglanti, "select * from odalar WHERE id='$ID'");

    $sonuc1 = mysqli_fetch_assoc($sql1);
    $sonuc2 = mysqli_fetch_assoc($sql2);

    $adi = $sonuc1["ad"];
    $soyadi = $sonuc1["soyad"];
    $tcno = $sonuc1["tcno"];

    $odanumara = $sonuc2["numara"];
    $odafiyat = $sonuc2["fiyat"];



} else {


}
if (!empty($_POST)) {
    $adres = $_POST['adres'];
    $dogrumu = true;

    if(!empty($adres)) {
        mysqli_query($baglanti, "UPDATE odalar SET rezervkisi='$kadi'WHERE id=" . $ID);

        mysqli_query($baglanti, "INSERT INTO fatura (ad,soyad,tcno,firmaadi,fiyat,adres,odanumarasi,tarih)
        values ('$adi','$soyadi','$tcno','A OTELİ','$odafiyat','$adres','$odanumara','$date')") or die(mysqli_error($baglanti));

        header("Location:member.php?uye=$kadi");

    }
}
include("member_header.php");

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
            <td>TARİH : <?=date('d-m-Y'); ?></td>
        </tr>
        <tr>
            <td colspan="2">ODA NUMARASI : <?= $odanumara ?></td>
            <td>FİYATI : <?= $odafiyat ?> TL</td>
        </tr>

        <tr>

            <td colspan="3" align="center">ADRES</br>
                <textarea type="text" placeholder="LÜTFEN ADRES GİRİNİZ" name="adres" value=""></textarea>

            </td>
        </tr>


        <tr>
            <td colspan="3" align="center">

                <input type="submit" name="kayit" value="ONAYLA">
            </td>
        </tr>


    </table>
</form>