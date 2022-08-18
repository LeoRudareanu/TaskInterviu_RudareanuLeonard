<?php

$myServer = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbNameConn = "page";

//connection to the db
$conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbNameConn);

if($conn)
    echo("CONEXIUNE REUSITA LA DB");

else
    echo("CONEXIUNE NEREUSITA LA DB");



$email = $_GET["email"];
$password = $_GET["password"];

echo("<br> Email = ");
echo($email);
echo("<br> Parola = ");
echo($password);

$searchInSQL = "SELECT * from users WHERE Email = '".$email."' AND Password = '".$password."'";

$theQueryToDB = mysqli_query($conn, $searchInSQL);
echo("<br>");

if(mysqli_num_rows($theQueryToDB) > 0)
    echo("TE-AI LOGAT");
else
    echo("CONTUL NU EXISTA");

?>