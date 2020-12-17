<?php include("connection_database.php");

if (isset($_GET["id"])) {
    $gelenID = $_GET["id"];
    $sql = mysqli_query($baglanti, "select * from uye WHERE id=" . $gelenID);

    $kisiID=$gelenID;
    $sonuc = mysqli_fetch_assoc($sql);

    $adi = $sonuc["ad"];
    $soyadi = $sonuc["soyad"];
    $kadi=$sonuc["kadi"];
    include("member_header.php");



} else {
    $adi = "";
    $soyadi = "";
    $kadi="";


}
?>

<h1 align="center">ODALAR</h1>

<form>

    <br>
    <table border="5" width="400" align="center">

        <thead>
        <tr>
            <td align="center">ODA NUMARASI</td>
            <td align="center" width="180">İŞLEM</td>

        </tr>
        </thead>


        <tbody>
        <?php

        $sorgu = mysqli_query($baglanti, "select * from odalar where rezervkisi = '$kadi' ");

        while ($row = mysqli_fetch_assoc($sorgu)) {

            $ID = $row['id'];
            ?>


            <tr>
                <td align="center"><?= $row["numara"]; ?> </td>
                <td align="center">
                    <a href="room_clear.php?id=<?= $ID ?>&uye=<?= $kadi ?>">REZERVASONU İPTAL ET</a>
                </td>
            </tr>


            <?php

        }
        ?>


        </tbody>

    </table>

</form>

