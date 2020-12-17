<?php
include("connection_database.php");

if($_GET["id"]){
    $ID = $_GET["id"];
    $yoneticiadi=$_GET["yonetici"];
    $kadi=$_GET["silinen"];

    $veri_sil = mysqli_query($baglanti,"DELETE FROM uye WHERE id ='$ID'")or die ( "hata oluştu");
    mysqli_query($baglanti, "UPDATE odalar SET rezervkisi = '' where rezervkisi='$kadi'");


    if($veri_sil){
        header("Location:member_list.php?yonetici=$yoneticiadi");
    }else{

        echo 'Olası veritabanı hatası!';
    }

}else{

    echo 'veri gelmedi.';
}

?>