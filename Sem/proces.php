<?php

session_start();

$nazov = '';
$text = '';

$mysqli = new mysqli('localhost', 'root', 'dtb456', 'db1' ) or die(mysqli_error($mysqli));

if (isset($_POST['ulozit'])){
    $nazov = $_POST['nazov'];
    $text = $_POST['text'];
    $mysqli->query("INSERT INTO data (nazov, text) VALUES ('$nazov', '$text')") or die($mysqli->error);
    header("location:forum.php");

}

if (isset($_GET['zmaz'])){
    $id = $_GET['zmaz'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    header("location:forum.php");

}

if (isset($_GET['uprav'])){
    $id = $_GET['uprav'];
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $_SESSION[$nazov] = $row['nazov'];
        $text = $row['text'];
    }

    header("location:forum.php");
}