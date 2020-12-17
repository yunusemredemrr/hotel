<?php include("connection_database.php");
$dogrumu = false;

if (isset($_GET["yonetici"])) {
    $yoneticiadi = $_GET["yonetici"];
    $sql = mysqli_query($baglanti,"SELECT * FROM yonetici where yoneticiadi = '$yoneticiadi'");
    $yoneticibilgi = mysqli_fetch_assoc($sql);
    $adi = $yoneticibilgi["ad"];
    $soyadi = $yoneticibilgi["soyad"];

} else {
    $yoneticiadi = "";
    $adi = "";
    $soyadi = "";
}
if (!empty($_POST)) {
    $searchedword = $_POST['searchedword'];
    $searchtype = $_POST['searchtype'];


    if (!empty($searchedword) && !empty($searchtype)) {
        $dogrumu = true;


        if ($searchtype == "uye") {
            include("admin_header.php");
            echo "<br>";
            include("search_html.php");
            ?>
            <h1 align="center">ARAMA SONUCU </h1>

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


                    $sorgu = mysqli_query($baglanti, "select * from uye where kadi='$searchedword'");


                    while ($row = mysqli_fetch_assoc($sorgu)) {

                        $ID = $row['id'];
                        $kkadi = $row['kadi'];


                        $sorgu2 = mysqli_query($baglanti, "select * from odalar where rezervkisi = '$kkadi'");
                        $odanumara = null;
                        for ($i = 0; $i < 17; $i++) {
                            $oda = mysqli_fetch_assoc($sorgu2);
                            if ($oda == null) {
                                $i = 17;
                            }

                            $odanumara[] = $oda["numara"];

                        }
                        ?>


                        <tr>
                            <td align="center"><?= $row["ad"]; ?> </td>
                            <td align="center"><?= $row["soyad"]; ?></td>
                            <td align="center"><?= $row["kadi"]; ?></td>
                            <td align="center"><?= $row["tcno"]; ?></td>
                            <td align="center"><?= $row["dogumtarihi"]; ?></td>
                            <td align="center" width="60"><?php foreach ($odanumara as $a) {
                                    if ($a == null) {

                                    } else {
                                        echo "-$a-";
                                    }
                                } ?></td>
                            <td>
                                <a href="member_delete.php?id=<?= $ID ?>&yonetici=<?= $yoneticiadi ?>&silinen=<?= $row["kadi"] ?>">SİL</a>
                            </td>
                        </tr>


                        <?php

                    }
                    ?>


                    </tbody>

                </table>

            </form>
            <?php
        } elseif ($searchtype == 'oda') {
            if (is_numeric($searchedword)) {
                include("admin_header.php");
                echo "<br>";
                include("search_html.php");
                ?>
                <h1 align="center">ARANAN SONUCU</h1>

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

                $sorgu3 = mysqli_query($baglanti, "select * from odalar where numara = " . $searchedword);

                while ($row3 = mysqli_fetch_assoc($sorgu3)) {

                    $ID3 = $row3['id'];
                    ?>

                    <tr>
                        <td align="center"><?= $row3["numara"]; ?> </td>
                        <td align="center"><?= $row3["rezervkisi"]; ?> </td>
                        <td align="center">
                            <a href="room_delete.php?id=<?= $ID3 ?>&yonetici=<?= $yoneticiadi ?>">SİL</a>
                        </td>
                    </tr>


                    <?php
                }
            }else{
                header("Refresh: 0; url=search.php?yonetici=$yoneticiadi");
            }
            ?>


            </tbody>

            </table>

            </form>

            <?php
        }


    } else {

        echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                     <font size='7'>HİÇBİR ŞEY GİRİLMEDİ!!!!!</font>";
    }

}

if (!$dogrumu) {
    include("admin_header.php");
    echo "<br>";
    include("search_html.php");
}
?>


