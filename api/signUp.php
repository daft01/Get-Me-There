<?php
    
    include '../dbConnection.php';
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    switch($httpMethod) {
    case "OPTIONS":
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-Control-Max-Age: 3600");
      exit();
    case "GET":
      http_response_code(401);
      echo "Not Supported";
      break;
    case "POST":
      echo "inside post";
      header("Access-Control-Allow-Origin: *");
      
      header("Content-Type: application/json");

      
      $rawJsonString = file_get_contents("php://input");

      
      $jsonData = json_decode($rawJsonString, true);

      
      if (empty($_POST["password"])) {
        echo json_encode(array(
          "isSignedUp" => false, 
          "message" => "No password provided"));
          
        exit;
      }

      if (empty($_POST["confirmation"])) {
        echo json_encode(array(
          "isSignedUp" => false, 
          "message" => "No password confirmation provided"));
          
        exit;
      }

      if ($_POST["password"] != $_POST["confirmation"]) {
        echo json_encode(array(
          "isSignedUp" => false, 
          "message" => "password does not equal confirmation"));
          
        exit;
      }
    
    $conn = getDatabaseConnection("get_me_there");
    
    $options = [
        'cost' => 11,
        ];
    try
    {
        
        
        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
        
        $sql = "INSERT INTO `users` (`name`, `birthday`, `username`, `email`, `password`, `mpg`)" . 
               "VALUES (:name, :birthday, :username, :email, :hashedPassword, :mpg)";
               
        $stmt = $conn->prepare($sql);
        $stmt->execute(array (
          ":email" => $_POST['email'],
          ":name" => $_POST['name'],
          ":birthday" => $_POST['birthday'],
          ":username" => $_POST['username'],
          ":mpg" => $_POST['mpg'],
          ":hashedPassword" => $hashedPassword));
        
        $_SESSION["email"] = $record["email"];
        $_SESSION["isAdmin"] = false;
        
        $records = $stmt->fetchAll();
        //$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        var_dump($records);
        echo "hello";
        echo json_encode($records);
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
      break;
    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }
?>