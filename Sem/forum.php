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
include('proces.php');
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

    <?php require_once('proces.php')?>
    <?php
        $mysqli = new mysqli('localhost', 'root', 'dtb456', 'db1' ) or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * from data") or die($mysqli->error);
        ?>

         <div class="forum">
             <table>
                 <thead>
                 <tr>
                     <th>Nazov</th>
                     <th>Text</th>
                     <th colspan="2">Akcia</th>
                 </tr>
                 </thead>
                 <?php
                    while ($poleNazovText = $result->fetch_assoc()):
                 ?>
                    <tr>
                        <td>
                            <?php echo $poleNazovText['nazov']; ?>
                        </td>
                        <td>
                            <?php echo $poleNazovText['text']; ?>
                        </td>
                        <td>
                            <a href="forum.php?uprav=<?php echo $poleNazovText['id']; ?>"> Uprav </a>
                            <a href="proces.php?zmaz=<?php echo $poleNazovText['id']; ?>"> Zmaz </a>
                        </td>
                    </tr>
                 <?php
                    endwhile;
                 ?>
             </table>
         </div>

        <?php
            function pre_r($array) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
    ?>

    <div class="zadanie">
    <form action="proces.php" method="POST">
        <div>
        <label>Nazov</label>
        <input type="text" name="nazov" class="lama"
               value="Sem zadajte meno"
        </div>
        <div>
        <label>Text</label>
        <input type="text" name="text"
               value="Sem zadajte text"
        </div>
        <div>
        <button type="submit" name="ulozit">Uloz</button>
        </div>
    </form>
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