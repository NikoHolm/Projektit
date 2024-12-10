<?php
session_start();

// Ostoskorin tyhjennys
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['empty_cart'])) {
    $_SESSION['ostoskori'] = [];
    echo "<p class='message'>Ostoskori on tyhjennetty.</p>";
}

// Tuotteen lisääminen ostoskoriin
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['empty_cart'])) {
    $tuote = [
        'id' => $_POST['id'],
        'nimi' => $_POST['nimi'],
        'hinta' => $_POST['hinta'],
    ];

    if (!isset($_SESSION['ostoskori'])) {
        $_SESSION['ostoskori'] = [];
    }

    $_SESSION['ostoskori'][] = $tuote;
}

// Tuotearvostelut
$tuote_arvostelut = [
    'iPhone 14' => [
        ['nimi' => 'Anna', 'arvio' => 'Todella hyvä puhelin, suosittelen!', 'tähdet' => 5],
        ['nimi' => 'Matti', 'arvio' => 'Hyvä laatu mutta kalliimpi kuin kilpailijoilla', 'tähdet' => 4],
    ],
    'iPhone 15' => [
        ['nimi' => 'Jari', 'arvio' => 'Loistava puhelin edulliseen hintaan.', 'tähdet' => 5],
        ['nimi' => 'Laura', 'arvio' => 'Hinta-laatusuhde ei ole paras mutta olen tyytyväinen palveluun', 'tähdet' => 3],
    ],
];

// Näytetään ostoskori ja sen sisältö
if (isset($_SESSION['ostoskori']) && count($_SESSION['ostoskori']) > 0) {
    echo "<h1>Ostoskori</h1>";
    echo "<div class='cart-items'>";
    $total = 0;
    foreach ($_SESSION['ostoskori'] as $item) {
        echo "<div class='cart-item'>";
        echo "<h2>" . $item['nimi'] . "</h2>";
        echo "<p>Hinta: " . number_format($item['hinta'], 2, ',', '.') . " €</p>";
        $total += $item['hinta'];
        echo "</div>";
    }
    echo "</div>";
    echo "<p><strong>Yhteensä: " . number_format($total, 2, ',', '.') . " €</strong></p>";
    echo "<a href='../checkout.html' class='checkout-btn'>Siirry kassalle</a>";

    // Tyhjennä ostoskori -nappi
    echo "
    <form method='POST' action=''>
        <input type='hidden' name='empty_cart' value='1'>
        <button type='submit' class='empty-cart-btn'>Tyhjennä ostoskori</button>
    </form>";
} else {
    echo "<p>Ostoskori on tyhjä.</p>";
}

// Näytetään arvostelut tuotteille
echo "<h1>Tuotearvostelut</h1>";
foreach ($tuote_arvostelut as $tuote_nimi => $arvostelut) {
    echo "<div class='product-reviews'>";
    echo "<h2>" . $tuote_nimi . "</h2>";
    foreach ($arvostelut as $arvostelu) {
        echo "<div class='review'>";
        echo "<strong>" . $arvostelu['nimi'] . ":</strong>";
        echo "<p>" . $arvostelu['arvio'] . "</p>";
        echo "<p>Tähdet: " . str_repeat("★", $arvostelu['tähdet']) . str_repeat("☆", 5 - $arvostelu['tähdet']) . "</p>";
        echo "</div>";
    }
    echo "</div>";
}

?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ostoskori.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="shortcut icon" href="kuvat/Näyttökuva 2024-11-11 093213.png" />
    <title>Ostoskori | iStore.fi</title>
</head>
<body>
<footer>
        <div class="footer-container">
            <!-- Logo ja Tiedot -->
            <div class="footer-logo">
                <img src="../kuvat/Näyttökuva 2024-11-11 093213.png" alt="iStore.fi logo" class="footer-logo-img">
                <p>iStore.fi - Parhaat tarjoukset Apple-tuotteista</p>
            </div>
    
            <!-- Linkit -->
            <div class="footer-links">
                <h3>Linkit</h3>
                <ul>
                    <li><a href="../index.html" class="footer-btn">Etusivu</a></li>
                    <li><a href="tuotteet.php" class="footer-btn">Tuotteet</a></li>
                    <li><a href="alennukset.php" class="footer-btn">Alennukset</a></li>
                    <li><a href="../me.html" class="footer-btn">Tietoa meistä</a></li>
                    <li><a href="ostoskori.php" class="footer-btn">Ostoskori</a></li>
                </ul>
            </div>
    
            <!-- Linkit puhelimille -->
            <div class="footer-phones">
                <h3>Puhelimet</h3>
                <ul>
                    <!-- Linkit yksittäisiin puhelinprofiileihin, id muuttuu dynaamisesti -->
                    <li><a href="puhelin.php?id=1" class="footer-btn">iPhone 14 </a></li>
                    <li><a href="puhelin.php?id=2" class="footer-btn">iPhone 13 </a></li>
                    <li><a href="puhelin.php?id=3" class="footer-btn">iPhone 13 Pro </a></li>
                    <li><a href="puhelin.php?id=4" class="footer-btn">iPhone 12 </a></li>
                    <li><a href="puhelin.php?id=6" class="footer-btn">iPhone 16 </a></li>
                    <li><a href="puhelin.php?id=7" class="footer-btn">iPhone 16 Pro Max </a></li>
                    <li><a href="puhelin.php?id=8" class="footer-btn">iPhone 16 Plus </a></li>
                    <li><a href="puhelin.php?id=9" class="footer-btn">iPhone 16 Plus </a></li>
                    <li><a href="puhelin.php?id=10" class="footer-btn">iPhone 15 </a></li>
                    <li><a href="puhelin.php?id=11" class="footer-btn">iPhone 15 Pro </a></li>
                    <li><a href="puhelin.php?id=13" class="footer-btn">iPhone 15 Pro Max </a></li>
                </ul>
            </div>
    
            <!-- Yhteystiedot -->
            <div class="footer-contact">
                <h3>Yhteystiedot</h3>
                <ul>
                    <li>📧 Sähköposti: <a href="mailto:info@istore.fi">info@istore.fi</a></li>
                    <li>📞 Puhelin: +358 44 123 4567</li>
                    <li>📍 Osoite: iStore.fi, Esimerkkikatu 1, 00100 Helsinki</li>
                </ul>
            </div>
        </div>
    
        <!-- Lisätiedot ja tekijä -->
        <div class="footer-bottom">
            <p>Verkkosivusto on suunniteltu ja kehitetty osana Savon ammattiopiston opiskelijaprojektia.</p>
            <p>&copy; 2024 iStore.fi - Kaikki oikeudet pidätetään.</p>
            <p>Sivuston on tehnyt Niko Holm.</p>
            
            <div class="footer-extra-links">
                <a href="../checkout.html" class="footer-btn">älä paina</a> | 

            </div>
        </div>
    </footer>

</body>
</html>
