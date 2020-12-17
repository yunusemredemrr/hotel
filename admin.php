<?php
include ("connection_database.php");
session_start();
if (empty($_SESSION['logged'])){
    header("Location:index.php");
}else{
    if (isset($_GET["yonetici"])) {
        $yoneticiadi = $_GET["yonetici"];
        $sql = mysqli_query($baglanti,"SELECT * FROM yonetici where yoneticiadi = '$yoneticiadi'");
        $yoneticibilgi = mysqli_fetch_assoc($sql);
        $adi = $yoneticibilgi["ad"];
        $soyadi = $yoneticibilgi["soyad"];

    }else{
        $yoneticiadi="";
        $adi = "";
        $soyadi = "";
    }

    include("admin_header.php");
    ?>

    </br>

        <tr>

            <td colspan="3">
                <?php
                if (empty($_GET['page'])) {
                    $page = "";
                } else {
                    $page = $_GET['page'];
                }

                if ($page == "members") {
                    header("Location:member_list.php?yonetici=$yoneticiadi");
                }else if ($page == "search") {
                    header("Location:search.php?yonetici=$yoneticiadi");
                }else if($page == "rooms"){
                    header("Location:rooms.php?yonetici=$yoneticiadi");
                }



                ?>
            </td>

        </tr>
    <?php
}
?>