<?php
require_once './baglan.php';

// formdan yolladığım gizli input value sunu kotrol ediyorum
if (isset($_POST['rmid'])) {
    // değeri integer a çeviriyorum
    $id = intval($_POST['rmid']);

    $sorgu = $db->prepare("DELETE FROM finaldb.personeller WHERE id = ?");
    
    try {
        $sorgu->execute([$id]); ?>
        <div class="basarili">
            silme işlemi başarılı<br>
            id : <?= $id ?>
        </div>
    <?php } catch (PDOException $e) { ?>
        <div class="hata">
            bir hata oluştu
        </div>
    <?php die($e . '<br><br><a class=" button button-primary" href="../index.php">ana sayfa</a><br>');
    }
} ?>
