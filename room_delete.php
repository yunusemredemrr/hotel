<?php
include("connection_database.php");

if($_GET["id"]){
    $ID = $_GET["id"];
    $yoneticiadi=$_GET["yonetici"];

    $veri_sil = mysqli_query($baglanti,"DELETE FROM odalar WHERE id ='$ID'")or die ( "hata oluştu");


    if($veri_sil){
        header("Location:admin.php?yonetici=$yoneticiadi");
        header("Location:admin.php?yonetici=$yoneticiadi");
    }else{

        echo 'Olası veritabanı hatası!';
    }

}else{

    echo 'veri gelmedi.';
}

?>