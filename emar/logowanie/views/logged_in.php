<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Witaj, <?php echo $_SESSION['user_name']; ?>. jestes zalogowany do loginmail.
Pamietaj ze po zamknieciu przegladarki i ponownym wejsciu na strone bedziesz nadal zalogowany! ;)

<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<a href="index.php?logout">Wyloguj</a>
