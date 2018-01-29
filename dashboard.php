<?php
session_start();
require_once("connect.php");
require_once("Query.php");

if(isset($_SESSION['gebruikersnaam'])) {
    include_once("sessionHeader.html");
} else {
    include_once("header.html");
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>BS Home</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<div class="titel">
    <img style="max-width: 25%" src="https://i.imgur.com/BcGPsGz.png">
</div>

<div class="form-style-6">
    <form id="registeren" action="updateNAW.php" method="Post"
          accept-charset="UTF-8">
        <h1>NAW Gegevens</h1>
        <input required type="hidden" name='submitted' id='submitted' value='1'/>
        <input required type="text" name = "naam" id="naam" placeholder="naam"/>
        <br>
        <input required type="text" name = "adres" id="adres" placeholder = "adres" value=""/>
        <br>
        <input required type="text" name = "woonplaats" id="woonplaats" placeholder = "woonplaats" value="" />
        <br>
        <input required type="submit" name = "submit" value = "gegevens bijwerken" />
    </form>
</div>

<div class="sportTabel">

</div>
</body>
</html>
