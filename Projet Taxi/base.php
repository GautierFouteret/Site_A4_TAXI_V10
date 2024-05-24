<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "taxi";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);

}

/*Pour le compte admin :
User : user_admin 
Pswrd : admin */

?>
