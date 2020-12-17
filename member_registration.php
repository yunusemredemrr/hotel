<?php
include("connection_database.php");
$dogrumu = false;

if (isset($_GET["id"])) {
    $ID = $_GET["id"];
    $sql = mysqli_query($baglanti, "select * from uye WHERE id=" . $ID);

    $sonuc = mysqli_fetch_assoc($sql);

    $adi = $sonuc["ad"];
    $soyadi = $sonuc["soyad"];
    $dtarih = $sonuc["dogumtarihi"];
    $tcno = $sonuc["tcno"];
    $kadi = $sonuc["kadi"];


    $sifre = $sonuc["sifre"];
    $dtarih = explode("-", $dtarih);
    $dgun = $dtarih[0];
    $day = $dtarih[1];
    $dyil = $dtarih[2];
    $kkadi = $kadi;


} else {
    $adi = "";
    $soyadi = "";
    $kadi = "";
    $tcno = "";
    $sifre = "";
    $dgun = "";
    $day = "";
    $dyil = "";


}
if (!empty($_POST)) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kadi = $_POST['kadi'];
    $tcno = $_POST['tcno'];
    $sifre = $_POST['sifre'];
    $dg = $_POST['gun'];
    $da = $_POST['ay'];
    $dy = $_POST['yil'];


    if (!empty($ad) && !empty($soyad) && !empty($sifre) && !empty($tcno) && !empty($kadi)) {
        $dogrumu = true;


        $tarih = $dg . '-' . $da . '-' . $dy;
        if (!empty($_POST["kayit"])) {
            $sorgu = mysqli_query($baglanti, "INSERT INTO uye (ad,soyad,tcno,dogumtarihi,sifre,kadi) 
                 
                 values ('$ad','$soyad','$tcno','$tarih','$sifre','$kadi')") or die(mysqli_error($baglanti));
        }

        if (!empty($_POST["guncelle"])) {
            mysqli_query($baglanti, "UPDATE odalar SET rezervkisi='$kadi' WHERE rezervkisi='$kkadi'");

            mysqli_query($baglanti, "UPDATE uye SET ad='$ad',soyad='$soyad',tcno='$tcno',dogumtarihi='$tarih',sifre='$sifre',kadi='$kadi' WHERE id=" . $ID);

        }

        header("Location:member.php?uye=$kadi");

    }

}

if (!$dogrumu){
include("member_header.php");
echo "<br>";
?>

<h1 align="center">KAYIT FORMU</h1>
</br>
<form method="post">
    <table border="2" width="500" height="500" align="center" valign="center">
        <tr>
            <td>AD</td>
            <td align="center"><input type="text" name="ad" maxlength="15" minlength="1" value="<?= $adi ?>"></td>
        </tr>
        <tr>
            <td>SOYAD</td>
            <td align="center"><input type="text" name="soyad" maxlength="15" minlength="1" value="<?= $soyadi ?>"></td>
        </tr>
        <tr>
            <td>TC KİMLİK NO</td>
            <td align="center"><input type="text" name="tcno" maxlength="11" minlength="11" value="<?= $tcno ?>"></td>
        </tr>
        <tr>
            <td>KULLANICI ADI</td>
            <td align="center"><input type="text" name="kadi" maxlength="15" minlength="1" value="<?= $kadi ?>"></td>
        </tr>
        <tr>
            <td>ŞİFRE</td>
            <td align="center"><input type="text" name="sifre" maxlength="15" minlength="1" value="<?= $sifre ?>"></td>
        </tr>


        <tr>
            <td>DOĞUM TARİHİ</td>
            <td align="center">
                <select name="gun">
                    <?php
                    for ($x = 1; $x < 32; $x++) {

                        if ($dgun == $x) {
                            echo "<option selected='selected' value='$dgun'>" . $dgun . '</option>';
                        } else {
                            echo "<option value='$x'>" . $x . '</option>';
                        }
                    }
                    ?></select>

                <select name="ay">
                    <option <?php if ($day == "01") {
                        echo 'selected="selected"';
                    } ?> value="01">OCAK
                    </option>
                    <option <?php if ($day == "02") {
                        echo 'selected="selected"';
                    } ?> value="02">ŞUBAT
                    </option>
                    <option <?php if ($day == "03") {
                        echo 'selected="selected"';
                    } ?> value="03">MART
                    </option>
                    <option <?php if ($day == "04") {
                        echo 'selected="selected"';
                    } ?> value="04">NİSAN
                    </option>
                    <option <?php if ($day == "05") {
                        echo 'selected="selected"';
                    } ?> value="05">MAYIS
                    </option>
                    <option <?php if ($day == "06") {
                        echo 'selected="selected"';
                    } ?> value="06">HAZİRAN
                    </option>
                    <option <?php if ($day == "07") {
                        echo 'selected="selected"';
                    } ?> value="07">TEMMUZ
                    </option>
                    <option <?php if ($day == "08") {
                        echo 'selected="selected"';
                    } ?> value="08">AĞUSTOS
                    </option>
                    <option <?php if ($day == "09") {
                        echo 'selected="selected"';
                    } ?> value="09">EYLÜL
                    </option>
                    <option <?php if ($day == "10") {
                        echo 'selected="selected"';
                    } ?> value="10">EKİM
                    </option>
                    <option <?php if ($day == "11") {
                        echo 'selected="selected"';
                    } ?> value="11">KASIM
                    </option>
                    <option <?php if ($day == "12") {
                        echo 'selected="selected"';
                    } ?> value="12">ARALIK
                    </option>

                </select>
                <select name="yil">
                    <?php
                    for ($y = 1900; $y <= date("Y"); $y++) {
                        if ($dyil == $y) {
                            echo "<option selected='selected' value='$y'>" . $y . '</option>';
                        } else {
                            echo "<option value='$y'>" . $y . '</option>';
                        }

                    }
                    ?>
                </select>


        </tr>
        <tr>
            <td colspan="2" align="center">
                <?php if (isset($_GET["id"])) { ?>

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