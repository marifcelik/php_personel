<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Ekleme Sayfası</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h3>personel <?= isset($_GET['id']) ? 'güncelleme' : 'ekleme' ?></h3>

        <?php
        require_once './add.php';
        include './update.php';
        include_once './control.php';

        // oturum açmadan girilmeye çalışılırsa sayfa yüklenmeyecek
        if (!isset($_SESSION['yetki'])) {
            echo '<div class="hata">';
            echo '    bu sayfaya giriş yetkiniz yok!';
            echo '</div>';
            header('Refresh:3, URL=index.php');
            die();
        }

        //id gönderilmişse form elemanlarının value ları için sorgu yapıyorum
        if (isset($_GET['id']))
            $personel = $db->query("SELECT * FROM finaldb.personeller WHERE id = " . $_GET['id'])->fetch(PDO::FETCH_ASSOC);
        ?>

        <!-- daha sonra value lara atama yapıyorum; personal value su varsa o olsun, yoksa boş olsun gibi -->
        <form method="post" class="form">
            <div class="row">
                <div class="six columns">
                    <label>Ad</label>
                    <input class="u-full-width" type="text" name="ad" required value="<?= $personel['ad'] ?? '' ?>">
                </div>
                <div class="six columns">
                    <label>Soyad</label>
                    <input class="u-full-width" type="text" name="soyad" required value="<?= $personel['soyad'] ?? '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label>TC</label>
                    <input class="u-full-width" type="text" name="tc" required pattern="[0-9]{11}" maxlength="11" value="<?= $personel['tc'] ?? '' ?>">
                </div>
                <div class="six columns">
                    <label>Ünvan</label>
                    <input class="u-full-width" type="text" name="unvan" required value="<?= $personel['unvan'] ?? '' ?>">
                </div>
            </div>
            <div class="row teldiv">
                <div class="six columns" style="margin: 0 auto !important;">
                    <label>Telefon</label>
                    <input class="u-full-width" type="text" name="tel" required pattern="[0-9]{10}" maxlength="10" value="<?= $personel['tel'] ?? '' ?>">
                </div>
            </div>
                <!-- görünmeyen bir input oluşturdum, form post edilirse bunu kontrol ederek işlem yapacağım -->
                <!-- bu form güncelleme için açılmışsa update adında id değerini, ekleme için açılmışsa add adında 1 değerini alacak ki submit olduğunu anlayabileyim -->
            <input type="hidden" name="<?= isset($_GET['id']) ? 'update' : 'add' ?>" value="<?= $_GET['id'] ?? '1' ?>">
            <div class="butons">
                <input type="submit" class="button-primary" value="<?= isset($_GET['id']) ? 'güncelle' : 'ekle' ?>">
                <a class="button button-primary red" href="index.php">ana sayfa</a>
            </div>
        </form>
    </div>
</body>

</html>