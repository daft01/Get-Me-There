<?php
    session_start();

    include "connect.php";
    
    $db = getDBConnection();
    
    // $query = "INSERT into user_data (email, password, first_name, last_name)
    // values('".$_POST["email"]."','".$_POST["pass"]."','".$_POST["firstname"]."','".$_POST["lastname"]."')"; 
   function emailExists($pdo, $email) {
    $stmt = $pdo->prepare("SELECT 1 FROM users WHERE email=?");
    $stmt->execute([$email]); 
    return $stmt->fetchColumn();
   }

     $options = [ 'cost' => 11 ];
          


    $email= $_POST["email"];

    if (emailExists($db,$email)) {
        // echo "found";
                echo json_encode(array("successfulLogin" => true)); 

    }  
    else{
        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
         $query = "INSERT into users (email, password, first_name, last_name)
    values('".$_POST["email"]."','".$hashedPassword."','".$_POST["firstname"]."','".$_POST["lastname"]."')"; 
     $statement = $db->prepare($query);
    $statement->execute();
    
    $records= $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array("successfulLogin" => true)); 
      
    }
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"]=$_POST["pass"];
    $_SESSION["firstname"]=$_POST["firstname"];
    $_SESSION["lastname"]=$_POST["lastname"];

    // print_r($_POST);
    
   
    
?>