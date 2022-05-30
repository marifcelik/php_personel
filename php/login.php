<?php
require_once './control.php';

if (isset($_SESSION['yetki']))
    header('URL=/final/php');
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Giriş</title>
</head>
<body>
    <div class="container">
        <form action="./control.php" method="post">
            <img src="../img/tux.png" alt="tux">
            <div class="row">
                <div class="one-half columns">
                    <label for="ad">Kullancı Adı</label>
                    <input class="u-max-full-width" type="text" name="ad" id="ad" required maxlength="25" pattern="[a-zA-Z0-9]*">
                </div>
            </div>
            <div class="row">
                <div class="one-half columns">
                    <label for="sifre">Şifre</label>
                    <input class="u-max-full-width" type="password" name="sifre" id="sifre" required>
                </div>
            </div>
            <!-- kontrol için gizli değişken -->
            <input type="hidden" name="login" value="1">
            <a class="button button-primary red" href="./index.php">ana sayfa</a>
            <button class="button-primary" type="submit">giriş yap</button>
        </form>
        <?php if (isset($_GET['hata'])) { ?>
            <div class="hata">
                kullanıcı adı ya da şifre hatalı
            </div>
        <?php } ?>
    </div>
</body>

</html>