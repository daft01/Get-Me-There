<?php
    include '../dbConnection.php';

    $conn = getDatabaseConnection("get_me_there");
  
    $options = [ 'cost' => 11 ];
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    
    $date = strtotime($_POST['birthday']);
    
    $newformat = date('Y-m-d', $time);
    
    // INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `city_mileage`, `freeway_mileage`, `birthday`) VALUES ( "j2@csumb.edu", "abc", "Jessi","Rios",8311234567,23,32,"19901231")
    $sql = "INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `city_mileage`, `freeway_mileage`, `birthday`)" .
                       "VALUES (:email, :password, :first_name, :last_name, :phone_number, :city_mileage, :freeway_mileage, :birthday)";
    // INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `phone_number`, `city_mileage`, `freeway_mileage`, `birthday`) VALUES ( "j4@csumb.edu", "abc", "Jessi","Rios","8311234567", 23, 32,"19901231")
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array (
      "isSignedUp" => true,
      ":email" => $_POST['email'],
      ":hashedPassword" => $hashedPassword,
      "first_name" => $_POST['first_name'],
      "last_name" => $_POST['last_name'],
      "phone_number" => $_POST['phone_number'],
      ":city_mileage" => $_POST['city_mileage'],
      ":freeway_mileage" => $_POST['freeway_mileage'],
      ":birthday" => $newformat));
    
    echo json_encode(array("isSignedUp" => true));
?>