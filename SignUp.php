<?php

function checkIfCharInString($myChar, $myString){
    for($i = 0; $i != NULL; $i = $i + 1)
        if($myString[$i] == $myChar)
            return true;

    return false;
}

$email = $_GET["email"];
echo("Email = ");
echo($email);
echo("<br>");
echo("Parola = ");
$password = $_GET["password"];
echo($password);

echo("<br>");
echo("

<script>
console.log(typeof strEmail);
</script>

");


echo("<br>DONE");

$myServer = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbNameConn = "page";

//connection to the db
$conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbNameConn);
echo("<br>");
if($conn)
    echo("conn DA");
else
    echo("conn NU");


$searchInSQL = "SELECT * from users WHERE Email = '".$email."'";

$queryDB = mysqli_query($conn, $searchInSQL);


$insertInSQL = "INSERT INTO users (Email, Password)
                VALUES ('".$email."', '".$password."')";


//DACA EMAIL-UL NU EXISTA IN DB, verificam sa indeplineasca toate conditiile, si daca le indeplineste, il adaugam

$validEmail = true;
$inserted = false;

if(mysqli_query($conn, $searchInSQL)){
    echo("<br>QUERY --------- DA<br>");

    if(!str_contains($email, '@')){
        echo("@ IN EMAIL NU ESTE<br>");
        $validEmail = false;
        echo("
        <script> 
            alert('Adresa de mail este invalida! Lipseste @-ul');
            window.location.href = './SignUp.html';
        </script>
        ");
    }
    
    if(strlen($password) < 5){
        echo("PAROLA MAI MICA DE 5<br>");
        $validEmail = false;
        echo("
        
        <script> 
            alert('Va rugam introduceti o parola mai lunga!');
            window.location.href = './SignUp.html';
        </script>

        ");

    }

    if($validEmail == true){
        echo($validEmail);
        echo("<br>inserted = ");
        echo($inserted);

        $inserted = true;
        if(mysqli_query($conn, $insertInSQL)){
            
            echo("<br>INSERAT");
        }
        else{
            echo("<br>NEINSERAT");
        }
    }

}

// else{?????????????
//     if($inserted == false){
//         echo("
//         <script>
//             alert('Adresa de email deja exista');
//             window.location.href = './SignUp.html';
//         </script>
    
//         ");
//     }
// }

?>



