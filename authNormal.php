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

    function matchingPassword($pdo,$email){
        
        $stmt = $pdo->prepare("SELECT password from users WHERE email=?");
        $stmt->execute([$email]); 
        // echo $stmt->fetchColumn();

        return $stmt->fetchColumn();
        
        // return password_verify($pwd, $stmt->fetchColumn());

    }
 

    // 115537343379344265745 imanr
    
    // 115615587817228894013 ijman
    $email= $_POST["email"];
    $passw= $_POST["password"];
    
    //   $options = [ 'cost' => 11 ];
    //       $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
        // echo $hashedPassword;
    if (emailExists($db,$email)) {
        //  echo matchingPassword($db,$email);
        // echo "<br>";
        // echo $passw;
        // if(matchingPassword($db,$email) ){
        //     if(password_verify($passw,matchingPassword($db,$email))){

        //     }


        // //     ob_start();
        // //   header("Location: https://get-me-there.herokuapp.com/",  true,  301 );  
        // // //   ob_end();
        // //   exit();

        // }

        // else{
        //     echo json_encode(array("wrongPass" => true)); 
        // }
    echo json_encode(array("successfulLogin" => true)); 


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