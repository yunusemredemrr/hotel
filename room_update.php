<?php include("connection_database.php");
$dogrumu = false;

if (isset($_GET["id"])) {
    $ID = $_GET["id"];
    $kisiID=$_GET["uyeid"];

    $sql1 = mysqli_query($baglanti, "select * from odalar WHERE id=" . $ID);
    $sql2 = mysqli_query($baglanti, "select * from uye WHERE id=" . $kisiID);

    $sonuc1 = mysqli_fetch_assoc($sql1);
    $sonuc2 = mysqli_fetch_assoc($sql2);

    $numara = $sonuc1["numara"];
    $rezervkisi = $sonuc1["rezervkisi"];
    $fiyat = $sonuc1["fiyat"];

    $adi = $sonuc2["ad"];
    $soyadi = $sonuc2["soyad"];
    $kadi=$sonuc2["kadi"];
    include("member_header.php");

} else {
    $rezervkisi="";
    $numara="";
    $fiyat="";

    $adi = "";
    $soyadi = "";
    $kadi="";

}
if (!empty($_POST)) {
    $rezervkisi = $kadi;





    if (!empty($numara) ) {
        $dogrumu = true;




        if (!empty($_POST["kayit"])) {


            header("Location:invoice.php?uye=$kadi&id=$ID");
        }
    }

}

if (!$dogrumu){
?>

<h1 align="center">ODA REZERVASYONU</h1>
<form method="post">
    <table border="2" width="500" height="500" align="center" valign="center">
        <tr>
            <td>ODA NUMARASI</td>
            <td align="center"><p><?= $numara ?></p></td>
        </tr>
        <tr>
            <td>FİYATI</td>
            <td align="center"><p><?= $fiyat ?></p></td>
        </tr>
        <tr>
            <td>REZERVE EDEN KİŞİ</td>
            <td align="center"><p><?=$adi." ".$soyadi ?></p></td>
        </tr>



        <tr>
            <td colspan="2" align="center">

                    <input type="submit" name="kayit" value="ONAYLA"> &nbsp;&emsp;


            </td>
        </tr>
        <?php
        }
        ?>

    </table>
</form>
