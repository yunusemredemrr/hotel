<html>
<head>
    <title>
        Anasayfa
    </title>
</head>
<body>
</br></br></br>
<h1 align="center">KULLANICI GİRİŞİ</h1>

<form action="member_login_process.php" method="post">
    <table border="4" align="center">
        <tr>
            <td>KULLANICI ADI</td>
            <td><input type="text" name="kadi" value=""></td>
        </tr>
        <tr>
            <td>ŞİFRE</td>
            <td><input type="password" name="sifre" value=""></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="giris" value="GİRİŞ YAP"></td>
        </tr>
    </table>
</form>
<h2 align="center"><a href="member_registration.php">KAYDOL</a> </h2>

</br></br></br></br>
<h1 align="center" >YÖNETİCİ GİRİŞİ</h1>
<form action="admin_login_process.php" method="post">
    <table border="4" align="center">
        <tr>
            <td>KULLANICI ADI</td>
            <td><input type="text" name="yoneticiadi" value=""></td>
        </tr>
        <tr>
            <td>ŞİFRE</td>
            <td><input type="password" name="sifre" value=""></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="giris" value="GİRİŞ YAP"></td>
        </tr>
    </table>
</form>

</body>
</html>
