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

    function matchingPassword($pdo, $pwd){
        $stmt = $pdo->prepare("SELECT email from users WHERE password=?");
        $stmt->execute([$pwd]); 
        return $stmt->fetchColumn();

    }
   


    $email= $_POST["email"];
    $passw= $_POST["password"];
       $options = [ 'cost' => 11 ];
          $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    
    if (emailExists($db,$email)) {
        if(matchingPassword($db,$hashedPassword)){
        echo json_encode(array("successfulLogin" => true)); 


        //     ob_start();
        //   header("Location: https://get-me-there.herokuapp.com/",  true,  301 );  
        // //   ob_end();
        //   exit();

        }
        else{
            echo json_encode(array("wrongPass" => true)); 
        }

    }  
    else{
            echo json_encode(array("noEmail" => true)); 
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
?>