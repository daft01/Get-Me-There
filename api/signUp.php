<?php
  session_start();
?>

<?php
    include 'dbConnection.php';
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    
    $conn = getDatabaseConnection("get_me_there");

    $rawJsonString = file_get_contents("php://input");
    $jsonData = json_decode($rawJsonString, true);
  
    $options = [ 'cost' => 11 ];
    try
    {
      $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
         // INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `city_mileage`, `freeway_mileage`, `birthday`) VALUES ( "j2@csumb.edu", "abc", "Jessi","Rios",8311234567,23,32,"19901231")
      $sql = "INSERT INTO `user`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `city_mileage`, `freeway_mileage`)
                         VALUES (:email, :password, :first_name, :last_name, :phone_number, :city_mileage, :freeway_mileage)";
                        // INSERT INTO `user`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `city_mileage`, `freeway_mileage`) VALUES ("rios@gmail.com","abc","Jess","rios",8315121212],23,23)
      
      $stmt = $conn->prepare($sql);
      $stmt->execute(array (
        ":email" => $_POST['email'],
        ":password" => $hashedPassword,
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "phone_number" => $_POST['phone_number'],
        ":city_mileage" => $_POST['city_mileage'],
        ":freeway_mileage" => $_POST['freeway_mileage']
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