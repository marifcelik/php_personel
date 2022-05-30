<?php
require_once './baglan.php';

// başlangıçta oturumu başlatıp yetkiyi kontrol ediyorum. yetki yoksa oturum açılmamış demektir
// her sayfada control u include ettiğimden bunu yapmam lazım yoksa diğer sayfalarda session başlamıyor.
session_start();
if (!isset($_SESSION['yetki']))
    session_destroy();

// oturum açılmışsa ve çıkış isteği gönderilmişse çıkış yapıyorum
if(isset($_SESSION['yetki']) && isset($_GET['cikis'])) {
    session_destroy();
    header('Location:index.php');
}

//oturum açma isteği
if(isset($_POST['login'])) {
    $ad = $_POST['ad'];
    //şifreyi md5 ile parola haline getiriyorum. veritabanında md5 halinde duruyor.
    $parola = md5($_POST['sifre']);

    $sorgu = $db->query("SELECT * FROM finaldb.users WHERE ad = '$ad' AND parola = '$parola'")->fetch(PDO::FETCH_ASSOC);
    //bilgiler doğruysa oturumu başlatıyorum, yetki değeri atıyorum ki güvenlik açısından tam kontrol olsun
    if ($sorgu) {
        session_start();
        $_SESSION['yetki'] = 1;
        header('Location:index.php');
    }
    else {
        // eşleşmemişse logine get ile hata gönderiyorum
        header('Location:login.php?hata=1');
    }
}