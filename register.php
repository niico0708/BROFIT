<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connect.php");
require_once("Query.php");

$hashedpw = password_hash($_POST['password'], PASSWORD_DEFAULT);

//overbodig veel variables aanmaken
$username=$_POST['username'];
$email=$_POST['email'];
$naam=$_POST['naam'];
$adres=$_POST['adres'];
$woonplaats=$_POST['woonplaats'];
$geslacht=$_POST['geslacht'];
$iban=$_POST['iban'];
$lidmaatschapid=$_POST['Abbo'];

//db klant updaten met ingevoerde gegevens
$valuesRegister2 = array('naam'=>$naam, 'adres'=>$adres, 'woonplaats'=>$woonplaats, 'geslacht'=>$geslacht, 'iban'=>$iban, 'lidmaatschapid'=>$lidmaatschapid);
$sqlRegister2 = "INSERT INTO klant (naam, adres, woonplaats, geslacht, iban, lidmaatschapid, lidsinds) VALUES (:naam, :adres, :woonplaats, :geslacht, :iban, :lidmaatschapid, NOW())";

Query($sqlRegister2, $valuesRegister2, false, false, true);

//klantid ophalen
$wwselsql= "SELECT `klantid` FROM `klant` WHERE `naam` = :naam";
$selKlantid=Query($wwselsql, array('naam'=>$naam))[0];
$klantid=$selKlantid['klantid'];

//db user updaten met ingevoerde gegevens
$valuesRegister = array('username'=>$username, 'password'=>$hashedpw, 'emailadres'=>$email, 'role'=>'role', 'klantid'=>$klantid );
$sqlRegister = "INSERT INTO user (username, password, emailadres, role, klantid) VALUES (:username, :password, :emailadres, :role, :klantid)";

Query($sqlRegister, $valuesRegister, false, false, true);

if(isset($_POST['submit'])){
    header('Location: registratieSuccess.php');
}

?>