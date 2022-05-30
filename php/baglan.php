<?php
try {
    $db = new PDO('mysql:localhost;dbname=finaldb', 'arif', '123');
} catch (PDOException $e) {
    echo '<div class="hata">';
    echo '    bağlantıda hata oluştu';
    echo '</div>';
    die($e);
}
