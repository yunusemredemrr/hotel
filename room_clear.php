<?php
include("connection_database.php");

if($_GET["id"]){
    $ID = $_GET["id"];
    $uye=$_GET["uye"];

    $veri_sil = mysqli_query($baglanti,"UPDATE odalar SET rezervkisi='' WHERE id ='$ID'")or die ( "hata oluştu");

    if($veri_sil){
        header("Location:member.php?uye=$uye");
    }else{

        echo 'Olası veritabanı hatası!';
    }

}else{

    echo 'veri gelmedi.';
}

?>