<html>
<head>
    <title>
        YÖNETİCİ
    </title>
</head>
<br>
<body>
<table border="" align="center">
    <tr>
        <td  height="50" align="center">
            <font size="+4"><p><b>YÖNETİCİ : <?= $adi." ".$soyadi ?></b></p></font>
        </td>
    </tr>

</table>

<table border="" align="right">
    <tr>
        <td width="100" height="50" align="center">
            <h3 align="right"><a href="logout_process.php">ÇIKIŞ YAP</a></h3>
        </td>
    </tr>

</table>


</br>
<table border="3" width="100%">
    <tr>
        <td align="center" width="450"><a href="/vizeProje/admin.php?page=members&yonetici=<?= $yoneticiadi ?>">ÜYELER</a></td>
        <td align="center" width="450"><a href="/vizeProje/admin.php?page=rooms&yonetici=<?= $yoneticiadi ?>">ODALAR</a></td>
        <td align="center" width="450"><a href="/vizeProje/admin.php?page=search&yonetici=<?= $yoneticiadi ?>">ARAMA</a></td>

    </tr>
    <tr>
    </tr>
</table>
</body>
</html>