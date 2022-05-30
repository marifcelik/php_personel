<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Personel Sayfası</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h3>personeller</h3>

        <?php
        include './baglan.php';
        require './control.php';
        include './rm.php';

        $personeller = $db->query('SELECT * FROM finaldb.personeller')->fetchAll(PDO::FETCH_ASSOC);

        if (isset($_SESSION['yetki'])) { ?>
            <a class="button button-primary" value="ekle" href="form.php">ekle</a>
            <a class="button button-primary red" value="ekle" href="./control.php?cikis=1">çıkış yap</a>
            <?php } else 
            echo '<a class="button button-primary green" value="ekle" href="./login.php">giriş yap</a>';
            ?>
        <table class="u-full-width">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>TC</th>
                    <th>Ünvan</th>
                    <th>Telefon</th>
                    <th>Kayıt Tarihi</th>
                    <?= isset($_SESSION['yetki']) ? '<th>İşlem</th>' : '' ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personeller as $personel) { ?>
                    <tr>
                        <?php foreach ($personel as $deger) {
                            echo "<td>$deger</td>";
                        } 
                        if (isset($_SESSION['yetki'])) { ?>
                        <td>
                            <!-- her bir satıra kendi id sini içeren bir düzenleme ver silme butonu ekliyorum. daha sonra o id ile get ya da post yapılabilecek -->
                            <a href="form.php?id=<?= $personel['id'] ?>"><img src="../img/edit.png" alt="edit"></a>
                            <!-- silme işlemini post ile yapailmek için form içine ekledim ve formun görünürlüğünü kapattım -->
                            <form method="post" class="rm-form">
                                <!-- submit butonuna tıklanması için bir label ekledim ve içine de resmi yerleştirdim -->
                                <!-- onclick ile onaylama aldım. onaylama true dönerse for çalışıyor ve butona tıklanmış oluyor -->
                                <label for="rm-button<?= $personel['id'] ?>" onclick="return confirm('silmek istediğinizden emin misiniz ?')"><img src="../img/rm.png" alt="delete"></label>
                                <!-- kontrol etmek ve id yi aktarabilmek için kullandığım bir input -->
                                <input type="hidden" name="rmid" value="<?= $personel['id'] ?>">
                                <!-- button id sini personel id si ile bağlantılı yaptım, bu sayede her silme butonu olduğu satırı silecek -->
                                <button style="display: none;" id="rm-button<?= $personel['id'] ?>" type="submit" class="rm-button"></button>
                            </form>
                        </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>