<?php
    session_start();

    include "connect.php";
    
    $db = getDBConnection();
    
    // $query = "INSERT into user_data (email, password, first_name, last_name)
    // values('".$_POST["email"]."','".$_POST["pass"]."','".$_POST["firstname"]."','".$_POST["lastname"]."')"; 
   function emailExists($pdo, $email) {
    $stmt = $pdo->prepare("SELECT 1 FROM user WHERE email=?");
    $stmt->execute([$email]); 
    return $stmt->fetchColumn();
   }

    function matchingPassword($pdo, $pwd,$email){
        $stmt = $pdo->prepare("SELECT password from user WHERE email=?");
        $stmt->execute([$pwd]); 
        return $stmt->fetchColumn();

    }
    //  $options = [ 'cost' => 11 ];
        //   $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);


    $email= $_POST["email"];
    $passw= $_POST["password"];

    if (emailExists($db,$email)) {
        if(matchingPassword($db,$passw, $email)){
            echo "logged in";
        }
        else{
            echo "wrong password";
        }

    }  
    else{
        echo "this account does not exist";
    //      $query = "INSERT into user (email, password)
    // values('".$_POST["email"]."','".$_POST["pass"]."','".$_POST["firstname"]."','".$_POST["lastname"]."')"; 
    //  $statement = $db->prepare($query);
    // $statement->execute();
    
    // $records= $statement->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($records);
      
    }
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"]=$_POST["pass"];
    $_SESSION["firstname"]=$_POST["firstname"];
    $_SESSION["lastname"]=$_POST["lastname"];

    // print_r($_POST);
    
   
    
?>