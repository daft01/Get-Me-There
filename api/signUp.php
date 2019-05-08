<?php
  session_start();
?>

<?php
    include 'dbConnection.php';
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    
    $conn = getDatabaseConnection("heroku_42b1ec32cf47072");

    $rawJsonString = file_get_contents("php://input");
    $jsonData = json_decode($rawJsonString, true);
  
    $options = [ 'cost' => 11 ];
    try
    {
      $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
      $sql = "INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `phone_number`)
                         VALUES (:email, :password, :first_name, :last_name, :phone_number)";
      
      $stmt = $conn->prepare($sql);
      $stmt->execute(array (
        ":email" => $_POST['email'],
        ":password" => $hashedPassword,
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "phone_number" => $_POST['phone_number']
        ));
      
      $_SESSION["email"] = $_POST['email'];
      $_SESSION["isAdmin"] = false;
          
      echo json_encode(array("isSignedUp" => true)); 
    }
    catch (PDOException $ex) {
        switch ($ex->getCode()) {
          case "23000":
            echo json_encode(array(
              "isSignedUp" => false, 
              "message"=> "email taken, try another",
              "details" => $ex->getMessage()));
            break;
          default:
            echo json_encode(array(
              "isSignedUp" => false, 
              "message"=> $ex->getMessage(),
              "details" => $ex->getMessage()));
            break;
        }
        exit;
      }
?>