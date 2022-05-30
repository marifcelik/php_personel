<?php
require_once './baglan.php';

//update ile post edilmişse
if (isset($_POST['update'])) {
    //değişken atama
    $id = $_POST['update'];
    $ad = $_POST['ad'] ?? null;
    $soyad = $_POST['soyad'] ?? null;
    $tc = $_POST['tc'] ?? null;
    $unvan = $_POST['unvan'] ?? null;
    $tel = $_POST['tel'] ?? null;

    if (!$ad || !$soyad || !$tc || !$unvan || !$tel) {
        echo '<div class="hata">';
        echo '    hata : değerlerden biri boş ya da hatalı';
        echo '</div>';
        echo '<a class=" button button-primary" href="index.php">ana sayfa</a>';
        echo '<a class=" button button-primary" href="form.php">tekrarla</a>';
        die();
    }

    $sorgu = $db->prepare('UPDATE finaldb.personeller SET ad = ?,  soyad = ?, tc = ?, unvan = ?, tel = ? WHERE id = ?');
    try {
        $sorgu->execute([$ad, $soyad, $tc, $unvan, $tel, $id]);
        echo '<div class="basarili">';
        echo '    başarılı';
        echo "<br>id = $id güncellendi";
        echo '</div>';
    } catch (PDOException $e) {
        echo '<div class="hata">';
        echo '    bir hata oluştu';
        echo '</div>';
        echo '<a class=" button button-primary" href="index.php">ana sayfa</a><br>';
        die($e);
    }
}
