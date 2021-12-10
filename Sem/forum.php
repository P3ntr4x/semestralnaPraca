<?php
 require "App.php";

 $app = new App();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="ikona.ico"/>
    <title> Hraj << DotA2 </title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section class="hlavicka">
    <nav>
        <a href="Sem/index.html"><img src="logo.png" alt="Logo mojej stranky"></a>
        <div class="menu" id="menuB">
            <i class="fa fa-times" onclick="skryMenu()"></i>
            <ul>
                <li><a href="index.html"> Domov</a></li>
                <li><a href="novinky.html"> Novinky</a></li>
                <li><a href="turnaje.html"> Turnaje</a></li>
                <li><a href="hrdinovia.html"> Hrdinovia</a></li>
                <li><a href="rebricek.html"> Rebríček</a></li>
                <li><a href="forum.php"> Diskusné Fórum</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="zobrazMenu()"></i>
    </nav>
    <div class="forum">
        <h1>Pridajte prispevok na forum</h1>
<form class="forumPridaj" method="post">
    <label for="nazov">Nazov: </label>
    <input type="text" name="nazov" id="nazov"><br>
    <label for="text">Text: </label>
    <textarea name="text" id="text"></textarea>
    <input type="submit" name="poslat" value="Odoslat">
</form>
    </div>
    <div class="prispevky">
<?php
    /** @var Blog $blog */
foreach ($app->getAllData() as $blog)
 {
     echo "<h2>" . $blog->getNazov() . "</h2>";
     echo "<small>" . $blog->getDatum() . "</small>";
     echo "<p>" . $blog->getText() . "</p>";
     echo "<hr>";
 }
?>
</div>

</section>
<script>

    var menuB = document.getElementById("menuB");

    function zobrazMenu()
    {
        menuB.style.right = "0";
    }

    function skryMenu()
    {
        menuB.style.right = "-200px";
    }

</script>
</body>
</html>