<?php
include("connection_database.php");

if (!empty($_GET["yonetici"])) {
    $yoneticiadi = $_GET["yonetici"];
    $sql = mysqli_query($baglanti, "select * from yonetici where yoneticiadi = '$yoneticiadi'" );

    $sonuc = mysqli_fetch_assoc($sql);

    $adi = $sonuc["ad"];
    $soyadi = $sonuc["soyad"];
    $yoneticiadi=$sonuc["yoneticiadi"];
    $sifre = $sonuc["sifre"];
    include("admin_header.php");



} else {
    $adi = "";
    $soyadi = "";
    $yoneticiadi="";
    $tcno="";
    $sifre="";
    $dgun = "";
    $day = "";
    $dyil = "";


}

?>

<h1 align="center">ÜYELER</h1>

<form>


    <br>

    <table border="2" width="100%">

        <thead>
        <tr>
            <td align="center">AD</td>
            <td align="center">SOYAD</td>
            <td align="center">KULLANICI ADI</td>
            <td align="center">TC KİMLİK NO</td>
            <td align="center">DOĞUM GÜNÜ</td>
            <td align="center">REZERVE ETTİĞİ ODALAR</td>
            <td align="center">İŞLEM</td>

        </tr>
        </thead>


        <tbody>
        <?php


        $sorgu = mysqli_query($baglanti, "select * from uye");


        while ($row = mysqli_fetch_assoc($sorgu)) {

            $ID = $row['id'];
            $kadi = $row['kadi'];


            $sorgu2 = mysqli_query($baglanti, "select * from odalar where rezervkisi = '$kadi'");
            $odanumara=null;
            for ($i=0;$i<17;$i++) {
                $oda = mysqli_fetch_assoc($sorgu2);
                if($oda==null){
                    $i=17;
                }

                    $odanumara[]=$oda["numara"];

            }
            ?>


            <tr>
                <td align="center"><?= $row["ad"]; ?> </td>
                <td align="center"><?= $row["soyad"]; ?></td>
                <td align="center"><?= $row["kadi"]; ?></td>
                <td align="center"><?= $row["tcno"]; ?></td>
                <td align="center"><?= $row["dogumtarihi"]; ?></td>
                <td align="center" width="60"><?php foreach ($odanumara as $a){
                    if($a==null){

                    }else {
                        echo "-$a-";
                    }
                    } ?></td>
                <td align="center">
                    <a href="member_delete.php?id=<?= $ID ?>&yonetici=<?= $yoneticiadi?>&silinen=<?= $row["kadi"]?>">SİL</a>
                </td>
            </tr>


            <?php

        }
        ?>


        </tbody>

    </table>

</form>

