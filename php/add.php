<?php
require_once './baglan.php';

// güvenlik için add şeklinde ir post olursa işlem yapıyorum
if (isset($_POST['add'])) {
    //gelen verileri kullanmak için değişkene atıyorum
    $ad = $_POST['ad'] ?? null;
    $soyad = $_POST['soyad'] ?? null;
    $tc = $_POST['tc'] ?? null;
    $unvan = $_POST['unvan'] ?? null;
    $tel = $_POST['tel'] ?? null;

    if (!$ad || !$soyad || !$tc || !$unvan || !$tel) { ?>
        <div class="hata">
            hata : değerlerden biri boş ya da hatalı
        </div>
        <a class=" button button-primary" href="index.php">ana sayfa</a>
        <a class=" button button-primary" href="form.php">tekrarla</a>
    <?php die();
    }

    $sorgu = $db->prepare('INSERT INTO finaldb.personeller (ad, soyad, tc, unvan, tel) VALUES (?, ?, ?, ?, ?)');
    try {
        $sorgu->execute([$ad, $soyad, $tc, $unvan, $tel]);
        echo '<div class="basarili">';
        echo '    başarılı';
        echo '</div>';
    } catch (PDOException $e) { ?>
        <div class="hata">
            bir hata oluştu
        </div>
        <a class=" button button-primary" href="index.php">ana sayfa</a><br>
<?php die($e);
    }
} ?>