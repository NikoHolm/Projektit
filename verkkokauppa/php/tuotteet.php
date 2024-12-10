<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Tuotteet | iStore.fi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel= "stylesheet" href="../css/styles.css">
  <link rel="stylesheet"  href="../css/tuotteet.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="shortcut icon" href="kuvat/Näyttökuva 2024-11-11 093213.png" type="" />
</head>
<body>


<header>
  <nav>
      <div class="logo">
          <a href="../index.html">iStore.fi</a>
      </div>
      <ul class="nav-links">
          <li><a href="../index.html">Etusivu</a></li>
          <li><a href="tuotteet.php">Tuotteet</a></li>
          <li><a href="alennukset.php">Alennukset</a></li>
          <li><a href="../me.html">Meistä</a></li>
      </ul>
  </nav>
</header>
<h1> Myynnissä olevat tuotteet</h1>
<h1> Muista tarkistaa alennukset!</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verkkokauppa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tuotteet";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='tuote-rivi'>";
    while($row = $result->fetch_assoc()) {
        echo   "<div class='tuote'>";
        echo     "<h2>" . $row['nimi'] . "</h2>";
        echo        "<img src='" . $row['kuva'] . "' alt='img" . $row['nimi'] . "' />";
        echo      "<p class='hinta'>Hinta: " . $row['hinta'] . " €</p>";
        echo    "<a href='puhelin.php?id=" . $row['id'] . "'>Lisää ostoskoriin</a>";
        echo  "</div>";
    }
    echo "</div>";
}
 else {
    echo "Ei tuotteita.";
}

$conn->close();
?>





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

 