<?php
    session_start();

    include "connect.php";
    
    $db = getDBConnection();
    
    $query = "INSERT into user_data (email, password, first_name, last_name)
    values('".$_POST["email"]."','".$_POST["pass"]."','".$_POST["firstname"]."','".$_POST["lastname"]."')"; 
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"]=$_POST["pass"];
    $_SESSION["firstname"]=$_POST["firstname"];
    $_SESSION["lastname"]=$_POST["lastname"];

    // print_r($_POST);
    $statement = $db->prepare($query);
    $statement->execute();
    
    $records= $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records); 
?>