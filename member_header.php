<html>
<head>
    <title>
        ÜYE
    </title>
</head>
<br>
<body>
<table border="" align="center">
    <tr>
        <td  height="50" align="center">
            <font size="+4"><p><b>ÜYE : <?= $adi." ".$soyadi ?></b></p></font>
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
        <td align="center" width="450"><a href="/vizeProje/member.php?sayfa=odalar&uye=<?= $kadi ?>">MÜSAİT ODALAR</a></td>
        <td align="center" width="450"><a href="/vizeProje/member.php?sayfa=bilgiler&uye=<?= $kadi ?>">BİLGİLERİM</a></td>
        <td align="center" width="450"><a href="/vizeProje/member.php?sayfa=rezerveodam&uye=<?= $kadi ?>">REZERV YAPILAN ODALAR</a></td>
        <td align="center" width="450"><a href="/vizeProje/member.php?sayfa=faturalarım&uye=<?= $kadi ?>">FATURALARIM</a></td>
    </tr>
    <tr>
    </tr>
</table>
</body>
</html>