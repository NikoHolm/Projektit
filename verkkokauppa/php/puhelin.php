<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verkkokauppa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tuotteet WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        echo "<h1>" . $row['nimi'] . "</h1>"; /* Haetaan nimi  tietokannasta nimi taulukosta */
        echo "<div class='product-image-container'><img src='" . $row['kuva'] . "' alt='" . $row['nimi'] . "' class='product-image' />"; /* Haetaan kuvaa tietokannasta ja lisätään class */
        echo "<p class='price'>Hinta: " . $row['hinta'] . " €</p>"; /* Haetaan hintaa tietokannasta */
        echo "<form method='post' action='ostoskori.php'>"; /* minne tiedot lähetetään */
        echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
        echo "<input type='hidden' name='nimi' value='" . $row['nimi'] . "' />";
        echo "<input type='hidden' name='hinta' value='" . $row['hinta'] . "' />";
        echo "<button type='submit' class='cart-btn'>Lisää ostoskoriin</button>";
        echo "</form>";
        echo "</div>"; /* Suljetaan div */
    } else {
        echo "<p>Tuotetta ei löytynyt.</p>";
    }
} else {
    echo "<p>Tuotteen ID puuttuu.</p>";
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="kuvat/Näyttökuva 2024-11-11 093213.png" type="image/png" />
    <link rel="stylesheet" href="../css/footer.css">
    <title>Puhelin | iStore.fi</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Yleinen ulkoasu */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f7f7f7; /* Vaaleanharmaa tausta */
            color: #333; /* Tummat tekstit, parempi kontrasti */
            padding: 20px;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2.5rem;
        }

        p {
            text-align: center;
            font-size: 1.2rem;
        }

        .product-image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .product-image {
            width: 60%; /* Pienempi koko kuvasta */
            max-width: 400px; /* Maksimikoko */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .price {
            font-size: 1.5rem;
            color: #3498db; /* Sininen väri */
            margin-top: 10px;
            font-weight: bold;
        }

        .cart-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #28a745; /* Vihreä tausta */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 20px;
        }

        .cart-btn:hover {
            background-color: #218838; /* Tummempi vihreä hover-tilassa */
            transform: translateY(-5px);
        }

        .back-button {
            display: block;
            text-align: center;
            
            width: 10%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            text-decoration: none;
            color: white;
            background-color: #3498db; /* Sininen tausta */
            padding: 12px 30px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #2980b9; /* Tummempi sininen hover-tilassa */
        }

        

    </style>
</head>
<body>

    <div class="container">
        <a href="tuotteet.php" class="back-button">Takaisin valikkoon</a>
    </div>
    
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
