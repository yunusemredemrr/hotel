<?php
include("connection_database.php");
$dogrumu = false;

if(isset($_GET["yonetici"])){
    $yoneticiadi = $_GET["yonetici"];
    $sql = mysqli_query($baglanti,"SELECT * FROM yonetici where yoneticiadi = '$yoneticiadi'");
    $yoneticibilgi = mysqli_fetch_assoc($sql);
    $adi = $yoneticibilgi["ad"];
    $soyadi = $yoneticibilgi["soyad"];
}else{
    $yoneticiadi="";
    $adi = "";
    $soyadi ="";
}
if (!empty($_POST)) {
    $odanumara = $_POST['numara'];

    if (!empty($odanumara)) {
        $dogrumu = true;

        mysqli_query($baglanti, "INSERT INTO odalar (numara) 
                 
                 values ('$odanumara')") or die(mysqli_error($baglanti));
        header("Location:rooms.php?yonetici=$yoneticiadi");

    }

}

if (!$dogrumu){
include("admin_header.php");
echo "<br>";
?>

<h1 align="center">ODA EKLEME</h1>
</br>
<form method="post">
    <table border="2" width="500" height="500" align="center" valign="center">
        <tr>
            <td>ODA NUMARASI</td>
            <td align="center"><input type="text" name="numara" maxlength="4" minlength="3" value=""></td>
        </tr>





        <tr>
            <td colspan="2" align="center">
                <?php if (isset($_GET["numara"])) { ?>

                    <input type="submit" name="guncelle" value="GÜNCELLE"> &nbsp;&emsp;

                    <?php
                } else {
                    ?>
                    <input type="submit" name="kayit" value="KAYDET"> &nbsp;&emsp; <?php } ?>
            </td>
        </tr>
        <?php
        }
        ?>

    </table>
</form>