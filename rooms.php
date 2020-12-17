<?php include("connection_database.php");

if (isset($_GET["yonetici"])) {
    $yoneticiadi = $_GET["yonetici"];
    $sql = mysqli_query($baglanti,"SELECT * FROM yonetici where yoneticiadi = '$yoneticiadi'");
    $yoneticibilgi = mysqli_fetch_assoc($sql);
    $adi = $yoneticibilgi["ad"];
    $soyadi = $yoneticibilgi["soyad"];
    include("admin_header.php");



} else {
    $yoneticiadi="";
    $adi = "";
    $soyadi ="";

}
?>

<h1 align="center">ODALAR</h1>

<form>

    <br>
    <table border="5" width="600" align="center">

        <thead>

        <tr>
            <td align="center">ODA NUMARASI</td>
            <td align="center">REZERVE EDEN KİŞİ</td>
            <td align="center" width="180">İŞLEM</td>

        </tr>
        </thead>


        <tbody>
        <?php

        $sorgu = mysqli_query($baglanti, "select * from odalar ");

        while ($row = mysqli_fetch_assoc($sorgu)) {

            $ID = $row['id'];
            ?>


            <tr>
                <td align="center"><?= $row["numara"]; ?> </td>
                <td align="center" ><?= $row["rezervkisi"]; ?> </td>
                <td align="center">
                    <a href="room_delete.php?id=<?= $ID ?>&yonetici=<?= $yoneticiadi ?>">SİL</a>
                </td>
            </tr>



            <?php

        }
        ?>
        <tr>
            <td colspan="3" align="center">
                <a href="room_add.php?yonetici=<?= $yoneticiadi ?>">ODA EKLE</a>
            </td>
        </tr>

        </tbody>

    </table>

</form>

